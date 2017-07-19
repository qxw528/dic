<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/28/17
 * Time: 4:45 PM
 */

namespace Annotation\Utils;


class FileUtil
{
    /**
     * List the all file in file path
     * @param string $filePath
     * @param string $suffix
     * @return array
     */
    public static function listFile(string $filePath,string $suffix):array {
        $files = array();
        if (is_file($filePath)) {
            $fileName = basename($filePath,$suffix);
            array_push($files,$fileName);
        } else if (is_dir($filePath)) {
            $tmpFiles = scandir($filePath);
            foreach ($tmpFiles as $key=>&$fileValue) {
                $fileName = basename($fileValue,$suffix);
                if ($fileName) {
                    if (strpos($fileName,'.') != 0) {
                        array_push($files,$fileName);
                    }
                }
            }
        }
        return $files;
    }

    /**
     * List the all file in file path
     * @param string $filePath
     * @return array
     */
    public static function listFiles(string $filePath):array {
        $files = array();
        if (is_file($filePath)) {
            $fileName = basename($filePath);
            array_push($files,$fileName);
        } else if (is_dir($filePath)) {
            $tmpFiles = scandir($filePath);
            foreach ($tmpFiles as $key=>&$fileValue) {
                $fileName = basename($fileValue);
                if ($fileName) {
                    if (strpos($fileName,'.') != 0) {
                        array_push($files,$fileName);
                    }
                }
            }
        }
        return $files;
    }
}