<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/19/17
 * Time: 9:27 AM
 */

namespace com\dic\qiusir\site\dss\param;


abstract class Param
{
    public $inputCharset;
    public $sign;
    public $appKey;
    public $signType;
    public $timestamp;
    public $version;
    public $method;

    /**
     * Param constructor.
     */
    public function __construct()
    {
        $this->version = "1.0";
        $this->inputCharset = "utf-8";
        $this->signType = 'md5';
        $this->timestamp = date('yyyy-MM-dd HH:ii:ss');
    }


}