<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/24/17
 * Time: 4:15 PM
 */

namespace Anno\Annotation\Document;


use Anno\Annotation\Utils\Arrays;
use Anno\Annotation\Utils\FileUtil;

class Analysis
{
    const ANNOTATION_REGULAR = "/@[A-Z][a-z]+(\(.*\))?/";
    public static $annotationKey = array();
    /**
     * analysis the annotations from document
     * @param string $document
     * @return array
     */
    public static function analysisDocument(string $document):array {
        $annotationArray = array();
        $matchFlag = preg_match(self::ANNOTATION_REGULAR,$document,$matchOut);
        if ($matchFlag === false) {
            return $annotationArray;
        } else {
            $annotations = array();
            foreach($matchOut as $key => &$value) {
                $searchPrefix = strpos($value,"(");
                $annotation = array();
                if ($searchPrefix !== false) {
                    $annotationName = substr($value,0,$searchPrefix);
                    $annotation['name'] = $annotationName;
                    $searchSuffix = strpos($value,")");
                    $values = array();
                    if ($searchSuffix !== false) {
                        $valueStr = substr($value,$searchPrefix,$searchSuffix);
                        $valueStrArray = explode(",",$valueStr);
                        foreach ($valueStrArray as $subValue) {
                             $splitSubValue = explode("=",$subValue);
                             if (count($splitSubValue) == 2) {
                                 $splitSubValueArr['propertyName'] = $splitSubValue[0];
                                 $splitSubValueArr['propertyValue'] = $splitSubValue[1];
                                 array_push($values,$splitSubValueArr);
                             }
                        }

                    }
                    $annotation['value'] = $values;
                } else {
                    $annotation['name'] = $value;
                }
                array_push($annotations,$annotation);
            }
            return $annotations;
        }
    }

    /**
     * Put the annotation keywords to static array
     * @param string $filePath
     * @return array
     */
    public static function injectAnnotations(string $filePath) {
        if (!static::$annotationKey) {
            return static::$annotationKey;
        } else {
            $fileNames = FileUtil::listFile($filePath,".php");
            Arrays::pushAll(static::$annotationKey,$fileNames);
        }
    }
}