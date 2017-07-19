<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 5:46 PM
 */

namespace com\dic\qiusir\site\dss\request;


use com\dic\qiusir\site\Request;

class OrderLoadingRequest extends AbstractRequest implements Request
{

    function getAppParams()
    {
        // TODO: Implement getAppParams() method.
        //$paramJson = "{\"method\":\"epass.push.wms.stock.inventory.get\",\"app_key\":\"12910\",\"v\":\"1.0\",\"timestamp\":\"2016-09-03 16:01:30\",\"sign\":\"F19C25D12F4280F6EB44F3A02746376C\",“goods_list”:[{“type”:“1”,“warehouse_id”:“1230005”,“warehouse_name”:“仓库名称”,“goods_id”:“005624”,“goods_name”:“商品名称”,“goods_batch”:“no897345”,\"unit\":“880”,\"model_type”: “m0232”, “store_type”:“1”, “store_qty”:“20”, \"qty”:“1000”,“store_time”:“2015-12-1114:22:22”,“price_type”:“1”,“price_range”:“20”,\" price”: “588”, \"currency”:“CNY”,“price_time”:“2015-12-1114:22:22”}]}";
        $paramJson = "{\"method\":\"epass.push.orders.b2c.loading.status.add\",\"app_key\":\"12910\",\"v\":\"1.0\",\"timestamp\":\"2016-09-03 16:01:30\",\"sign\":\"F19C25D12F4280F6EB44F3A02746376C\",\"order_id\":\"THDD20171209072\",\"way_bill_no\":\"805166399604\",\"delivery_time \":\"2015-12-11 14:22:22\",\"logistics_name \":\"京东\",\"logistics_code \":\"1000823\",\"notes \":\"\",\"goods\":[{\"good_no \":\"4901301230829\",\"amount\":\"1\",\"unit_price\":\"100\",\"cph_tax_rate\":\"0.1\",\"cph_tax_fee\":\"10\"},{\"good_no\":\"PS4902011751338\",\"amount\":\"1\",\" unit_price\":\"100\",\"cph_tax_rate\":\"0.1\",\"cph_tax_fee\":\"10\"}]}";
        $params = json_decode($paramJson,1);
        return $params;
    }

    function getResponseClass()
    {
        // TODO: Implement getResponseClass() method.
        return 'com\dic\qiusir\site\dss\response\OrderNotifyResponse';
    }

    function getApiMethod()
    {
        // TODO: Implement getApiMethod() method.
    }
}