<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 4/7/17
 * Time: 4:37 PM
 */

namespace com\dic\framework\container;


class Container
{
    public static $container;



    public static function getSingleContainer():array {
        if (!self::$container) {
            self::$container = array();
        }
        return self::$container;
    }


    public static function clearAll() {
        self::$container = null;
    }
}