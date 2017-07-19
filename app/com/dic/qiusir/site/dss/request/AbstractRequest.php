<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 3:57 PM
 */

namespace com\dic\qiusir\site\dss\request;


abstract class AbstractRequest
{
    protected $timestamp;
    protected $sign;
    protected $version;
    protected $method;
    protected $inputCharset;
    protected $signType;

    public function __construct()
    {
        $this->timestamp = date("Y-m-d H:i:s");
        $this->version = "1.0";
        $this->inputCharset = 'utf-8';
        $this->signType = 'md5';
    }


    public function getSysParams() :array {
        $sysParams = array(
            'timestamp' => $this->timestamp,
            'version' => $this->version,
            'signType' => $this->signType,
            'inputCharset'=>$this->inputCharset
        );
        return $sysParams;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param mixed $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    }


}