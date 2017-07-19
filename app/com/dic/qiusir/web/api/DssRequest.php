<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/19/17
 * Time: 9:57 AM
 */

namespace com\dic\qiusir\web\api;


use com\dic\qiusir\site\dss\DssClient;
use com\dic\qiusir\site\dss\request\GoodsAddRequest;
use com\dic\qiusir\site\dss\request\OrderGetRequest;
use com\dic\qiusir\site\dss\request\OrderInboundRequest;
use com\dic\qiusir\site\dss\request\OrderLoadingRequest;
use com\dic\qiusir\site\dss\request\UpdateInventoryRequest;
use com\dic\qiusir\site\dss\request\WarningInventoryRequest;

class DssRequest implements Request
{
    const IPURL = "http://192.168.15.235:8080/dss";
    const HOSTURL = "http://dss.kuajing.com";

   public function request()
    {
        // TODO: Implement request() method.
        $orderGetRequest = new OrderGetRequest();
        $orderGetRequest->setOrderCode('XD17060800801');
        //192.168.15.235:8080/dss
        $dssClient = new DssClient(self::HOSTURL."/api/v1/order/find.do",'KUAJING_BBR','*829TL!bcmN9KywcKPzm');
        $response = $dssClient->execute($orderGetRequest);
        return $response;
    }

    public function notifyGoodsAdd()
    {
        $goodsAddRequest = new GoodsAddRequest();
        $dssClient = new DssClient(self::IPURL."/api/v1/notify/tope/receivegoods.do",'','');
        $response = $dssClient->notify($goodsAddRequest);
        return $response;
    }


    public function notifyOrderInbound() {
        $orderInboundRequest = new OrderInboundRequest();
        $dssClient = new DssClient(self::IPURL."/api/v1/notify/tope/orderinbound.do",'','');
        $response = $dssClient->notify($orderInboundRequest);
        return $response;
    }
    
    public function notifyOrderLoading() {
        $orderLoadingRequest = new OrderLoadingRequest();
        $dssClient = new DssClient(self::IPURL."/api/v1/notify/tope/orderloading.do",'','');
        $response = $dssClient->notify($orderLoadingRequest);
        return $response;
    }

    public function notifyUpdateInventory() {
        $updateInventoryRequest = new UpdateInventoryRequest();
        $dssClient = new DssClient(self::IPURL."/api/v1/notify/tope/updateinventory.do",'','');
        $response = $dssClient->notify($updateInventoryRequest);
        return $response;
    }

    public function notifyWarningInventory() {
        $warningInventoryRequest = new WarningInventoryRequest();
        $dssClient = new DssClient(self::IPURL."/api/v1/notify/tope/warninginventory.do",'','');
        $response = $dssClient->notify($warningInventoryRequest);
        return $response;
    }

}