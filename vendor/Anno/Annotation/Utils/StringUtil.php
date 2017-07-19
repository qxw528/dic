<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/29/17
 * Time: 10:02 AM
 */

namespace Anno\Annotation\Utils;


class StringUtil
{
    /**
     * Check the character is first character of string
     * @param string $string
     * @param string $char
     * @return bool
     */
    public static function startWith(string $string,string $char):bool {
        return strpos($string,$char) === 0;
    }

    /**
     * Check the character is end character of string
     * @param string $string
     * @param string $char
     * @return bool
     */
    public static function endWith(string $string,string $char):bool {
        return strrpos($string,$char) === 0;
    }
}