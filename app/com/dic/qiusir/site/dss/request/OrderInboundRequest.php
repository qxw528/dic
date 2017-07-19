<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 5:39 PM
 */

namespace com\dic\qiusir\site\dss\request;


use com\dic\qiusir\site\Request;

class OrderInboundRequest extends AbstractRequest implements Request
{

    function getAppParams()
    {
        // TODO: Implement getAppParams() method.
        $paramJson = "{\"method\":\"epass.push.orders.b2c.inbound.status.add\",\"app_key\":\"12910\",\"v\":\"1.0\",\"timestamp\":\"2016-09-03 16:01:30\",\"sign\":\"F19C25D12F4280F6EB44F3A02746376C\",\"report_id\":\"THDD20171209072\",\"order_id\":\"CUSTJJ151215016542\",\"apply_time\":\"2015-12-16 12:22:44\",\"status\":\"11\",\"way_bill_no\":\"805166399604\",\"logistics_name\":\"圆通\",\"logistics_code\":\"0000025\",\"notes\":\"\",\"type\":\"1\"}";
        $params = json_decode($paramJson,1);
        return $params;
    }

    function getResponseClass()
    {
        return 'com\dic\qiusir\site\dss\response\OrderNotifyResponse';
    }

    function getApiMethod()
    {
        // TODO: Implement getApiMethod() method.
    }
}