<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 3:56 PM
 */

namespace com\dic\qiusir\site\dss\request;


use com\dic\qiusir\site\Request;

class OrderGetRequest extends AbstractRequest implements Request
{
    private $orderCode;

    public function getAppParams():array
    {
        // TODO: Implement getAppParams() method.
        return array(
            'orderCode' => $this->orderCode,
            'method' =>$this->getApiMethod()
        );
    }

    public function getResponseClass()
    {
        // TODO: Implement getResponseClass() method.
        return 'com\dic\qiusir\site\dss\response\OrderGetResponse';
    }

    function getApiMethod():string
    {
        // TODO: Implement getApiMethod() method.
        return 'com.dss.order.get.OrderGetRequest';
    }


    /**
     * @return mixed
     */
    public function getOrderCode()
    {
        return $this->orderCode;
    }

    /**
     * @param mixed $orderCode
     */
    public function setOrderCode($orderCode)
    {
        $this->orderCode = $orderCode;
    }


}