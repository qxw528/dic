<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 3:26 PM
 */

namespace com\dic\qiusir\site\dss\response;


use com\dic\qiusir\site\Response;

class OrderNotifyResponse extends NotifyResponse implements Response
{
    public $order_id;

    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }



}