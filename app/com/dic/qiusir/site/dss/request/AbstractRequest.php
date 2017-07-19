<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 3:57 PM
 */

namespace com\dic\qiusir\site;


abstract class AbstractRequest
{
    protected $timestamp;
    protected $sign;
    protected $version;
    protected $method;

    public function __construct()
    {
        $this->timestamp = date("yyyy-MM-dd HH:ii:ss");
        $this->version = "1.0";
    }


    public function getSysParams() :array {
        $sysParams = array(
            'method' => $this->method,
            'timestamp' => $this->timestamp,
            'version' => $this->version,
            'signType' =>'MD5'
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