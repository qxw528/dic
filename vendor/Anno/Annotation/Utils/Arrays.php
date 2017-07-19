<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/28/17
 * Time: 5:08 PM
 */

namespace Annotation\Utils;


class Arrays
{
    /**
     * Push the sub array to array
     * @param array $array
     * @param array $val
     */
    public static function pushAll(array &$array,array &$val) {
        foreach ($val as $k=>$v) {
            array_push($array,$v);
        }
    }
}