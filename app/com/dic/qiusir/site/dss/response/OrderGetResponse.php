<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 4:25 PM
 */

namespace com\dic\qiusir\site\dss\response;


use com\dic\qiusir\site\Response;

class OrderGetResponse extends AbstractResponse implements Response
{
    private $object;

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    
}