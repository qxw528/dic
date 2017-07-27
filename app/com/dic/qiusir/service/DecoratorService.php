<?php

/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/26/17
 * Time: 3:58 PM
 */
namespace com\dic\qiusir\service;


abstract class DecoratorService
{

/*    public function __call($method,$args) {
        if (!method_exists($this,$method)) {
            throw new \Exception("Didn't define method");
        }
        echo 'Some stuff before',PHP_EOL;
        $returnValue = call_user_func_array(array($this,$method),$args);
        echo 'Some stuff after',PHP_EOL;
        return $returnValue;
    }*/
}