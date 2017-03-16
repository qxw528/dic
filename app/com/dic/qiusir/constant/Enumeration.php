<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 11:21 AM
 */

namespace com\dic\qiusir\constant;


class Enumeration
{
    /**
     * enumeration get enum map
     * @return array
     */
    public static function getEnumMap():array {
        $enumMap = array();
        $rfClass = new \ReflectionClass(get_called_class());
        foreach ($rfClass->getConstants() as $constKey => $constValue) {
            $enumMap[$constKey] = $constValue;
        }
        return $enumMap;
    }

    /**
     * enumeration get enum key
     * @param string $const
     * @return string
     */
    public static function getEnumKey(string $const):string {
        $rfClass = new \ReflectionClass(get_called_class());
        foreach ($rfClass->getConstants() as $constKey => $constValue) {
            if ($constValue === $const) {
                return $constKey;
            }
        }
        return "";
    }
}