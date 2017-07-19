<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 5:58 PM
 */

namespace com\dic\qiusir\site\dss\request;


use com\dic\qiusir\site\Request;

class WarningInventoryRequest extends AbstractRequest implements Request
{

    function getAppParams()
    {
        // TODO: Implement getAppParams() method.
        $paramJson = "{\"method\":\"epass.push.wms.stock.waring.inventory.get\",\"app_key\":\"12910\",\"v\":\"1.0\",\"timestamp\":\"2016-09-03 16:01:30\",\"sign\":\"F19C25D12F4280F6EB44F3A02746376C\",\"goods_list\":[{\"type\":\"1\",\"warehouse_id\":\"1230005\",\"warehouse_name\":\"仓库名称\",\"goods_id\":\"005624\",\"goods_name\":\"商品名称\",\"goods_batch\":\"no897345\",\"store_type\":\"2\",\"waring_text\":\"商品库存数量少于100\",\"waring_time\":\"2015-12-11 14:22:22\"}]}";
        $params = json_decode($paramJson,1);
        return $params;
    }

    function getResponseClass()
    {
        // TODO: Implement getResponseClass() method.
        return 'com\dic\qiusir\site\dss\response\CommonNotifyResponse';
    }

    function getApiMethod()
    {
        // TODO: Implement getApiMethod() method.
    }
}