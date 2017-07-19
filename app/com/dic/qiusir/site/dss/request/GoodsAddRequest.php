<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/17/17
 * Time: 3:21 PM
 */

namespace com\dic\qiusir\site\dss\request;


use com\dic\qiusir\site\Request;

class GoodsAddRequest extends AbstractRequest implements Request
{

    function getAppParams()
    {
        $paramJson = "{\"method\":\"epass.push.goods.add\",\"app_key\":\"12910\",\"v\":\"1.0\",\"timestamp\":\"2016-09-03 16:01:30\",\"sign\":\"F19C25D12F4280F6EB44F3A02746376C\",\"shop_id\":\"12095\",\"goods_id\":\"124\",\"goods_name\":\"巧克力\",\"goods_en_name\":\"cookies\",\"declare_plan\":\"0000017\",\"goods_barcode\":\"NIH45232N\",\"goods_brand\":\"德芙\",\"specifications\":\"39.50X32.60X 19.45\",\"goods_hscode\":\"CNY\",\"manufacturer\":\"某食品公司\",\"manufacturer_addr\":\"广东省广州市白云区白云路88号\",\"gross_weight\":\"5.2kg\",\"suttle_weight\":\"4kg\",\"component\":\"水，糖，食品添加剂，可可豆等\",\"expiration\":\"24个月\",\"goods_desc\":\"美味可口，纵享丝滑\",\"goods_qty\":\"20\",\"goods_price\":\"200.00\",\"goods_category_name\":\"18402\",\"warehouse_name\":\"一仓\",\"moq\":\"0\",\"country\":\"142\",\"main_img_url\":\"http://xxxx/xxx/xx/a.jpg\",\"goods_img_list\":[{\"img_index\":\"1001\",\"img_id\":\"vwre6254345\",\"img_url\":\"http://xxxx/xxx/xx/x.jpg\",\"img_created\":\"2015-12-11 14:22:22\"},{\"img_index\":\"1002\",\"img_id\":\"af526341234\",\"img_url\":\"http://xxxx/xxx/xx/x.jpg\",\"img_created\":\"2015-12-11 14:22:22\"}],\"des_img_list\":[{\"img_index\":\"1\",\"img_id\":\"af526341234\",\"img_url\":\"http://xxxx/xxx/xx/x.jpg\"}]}";
        $params = json_decode($paramJson,1);
        return $params;
    }

    function getResponseClass()
    {
        return 'com\dic\qiusir\site\dss\response\GoodsNotifyResponse';
    }

    function getApiMethod()
    {
        // TODO: Implement getApiMethod() method.
    }
}