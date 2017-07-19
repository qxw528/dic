<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 4:34 PM
 */

namespace com\dic\qiusir\site\dss\response;


class AbstractResponse
{
    protected $code;
    protected $msg;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    
}