<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 5:18 PM
 */

namespace com\dic\qiusir\web\api;


use com\dic\qiusir\constant\ZebraMessgeTypeEnum;
use com\dic\qiusir\utils\client\CurlUtils;

class DtsRequest
{
    const SECRET = '123456';
    const DTS_URL = 'http://dts.dss.kuajing.com/api/v1/transport/receivezebra';
    const DTS_LOCAL_URL = 'http://192.168.15.244:8080/dts/api/v1/transport/receivezebra';
    const DTS_DECLARE_URL = 'http://dts.dss.kuajing.com/api/v1/transport/declare';
    const DTS_LOCAL_DECLARE_URL = 'http://192.168.15.244:8080/dts/api/v1/transport/declare';
    const ZEBRA_TEST_URL = 'http://partner.test.360banma.net/api/eforward?_input_charset=utf-8';
    const DTS_FIND_URL = 'http://dts.dss.kuajing.com/api/v1/transport/find';
    const DTS_LOCAL_FIND_URL = 'http://192.168.15.227:88/dts/api/v1/transport/find';
    const DSS_LOGISTICS_API = 'http://192.168.15.244:8080/dss/api/v1/order/dtslogistics.do';

    public function request(string $msgType):string {
        $zebraMap = ZebraMessgeTypeEnum::getEnumMap();
        $deMsgType = $zebraMap[$msgType] ?? 'zebra.logistics.event.wms.checkorder';
        //$message = file_get_contents(ROOT_PATH.'/config/dts/zebra/'.$msgType.'.xml');
        //$message = '<logisticsEventsRequest><logisticsEvent><eventHeader><eventType>WMS_CHECK_ORDER</eventType><eventTime>2017-03-22 13:33:00</eventTime><eventSource>BANMA-0001</eventSource><eventTarget>KUAJING</eventTarget></eventHeader><eventBody><tradeDetail><tradeOrders><tradeOrder /></tradeOrders></tradeDetail><logisticsDetail><logisticsOrders><logisticsOrder><poNo>496076700041</poNo><occurTime>2017-03-22 13:29:11</occurTime><logisticsRemark>仓库已接单</logisticsRemark><logisticsCode>SUCCESS</logisticsCode></logisticsOrder></logisticsOrders></logisticsDetail></eventBody></logisticsEvent></logisticsEventsRequest>';
        $message = '<logisticsEventsRequest><logisticsEvent><eventHeader><eventType>WMS_STOCKOUT_INFO</eventType><eventTime>2017-03-24 10:54:38</eventTime><eventSource>BANMA-0001</eventSource><eventTarget>KUAJING</eventTarget></eventHeader><eventBody><tradeDetail><tradeOrders><tradeOrder /></tradeOrders></tradeDetail><logisticsDetail><logisticsOrders><logisticsOrder><segmentCode>BANMA-0001</segmentCode><poNo>496076700045</poNo><occurTime>2017-03-25 08:50:00</occurTime><carrierCode>ZEBRA</carrierCode><mailNo>2678629796</mailNo><logisticsRemark>航空运输中</logisticsRemark><logisticsCode>AIR</logisticsCode><logisticsFeature>{"bigBagId":""}</logisticsFeature><packingType>0</packingType><packageType>0</packageType><logisticsWeight>0</logisticsWeight></logisticsOrder></logisticsOrders></logisticsDetail></eventBody></logisticsEvent></logisticsEventsRequest>';
        $dataDigest = base64_encode(md5($message.self::SECRET,1));
        $appKey = 'zebramaster';
        $params = array(
            'logistics_interface' =>$message,
            'msg_type' =>$deMsgType,
            'data_digest' => $dataDigest,
            'msg_id' => time()."",
            'version' => '1.0'
        );
        //echo http_build_query($params);
        var_dump($params);
        $result = CurlUtils::curlPost($params,self::DTS_URL);
        echo $result;
        return $result;
    }

    public function find():string {
        /*$params = array(
          'orderCode' => 'XD170223002042'
        );
        $result = CurlUtils::curlPost($params,self::DTS_FIND_URL);
        echo $result;*/
        $sign = hash_hmac("md5","0201704191.00900000002149770120170419-12511-133651-149258021176812511","phs711iKBDr2fwfF");
        return base64_encode($sign);
    }

    public function declare(string $msgType):string {
        //F36637IMDUL
        $orderJson0 = '{"amount":65,"batchNumber":"","bigHead":"","buyerAccount":"lshiqi","carrier":"XJJ","comment":"","country":"CN","currCode":"CNY","currentOperation":false,"declareMessage":"","declareModel":"BC","declareStatus":"","declareTime":null,"dutyPayby":"2","goodsAmount":65,"insuredValue":"","items":[{"amount":65,"country":"CN","goodsCode":"181440902871","goodsName":"16件套豪华修表工具（16-piece Deluxe Watch Repair Tool Kit Wrk001）","hsCode":"","itemTax":0,"netWeight":0,"orderNumber":"496076701001","price":65,"quantity":1,"saleCountry":"","taxRate":0,"unit":"","weight":1}],"logisticsFlag":false,"logisticsStatus":"","message":"","netWeight":0,"orderNumber":"XD170223002101","paymentCode":"","paymentNo":"","platformCode":"","postFee":0,"receiveMessage":"","receiverAddress":"嘉禾街道尖彭路华联工业区1315号","receiverAddressOne":"","receiverAddressTwo":"","receiverCountry":"CN","receiverCity":"广州市","receiverDistrict":"白云区","receiverId":"350425199206101449","receiverMail":"","receiverMobile":"17817883437","receiverName":"郭美兰","receiverProvince":"广东省","senderAddress":"street1 70 McCullough Dr #AA8000","senderAddressOne":"","senderAddressTwo":"","senderCity":"New Castle","senderDistrict":"","senderMobile":"302-604-5010","senderName":"USPS","senderNameOne":"","senderCountry":"US","senderProvince":"DE","senderZipCode":"","senderZipExt":"","service":"XJJ_A","shippingTime":null,"shopCode":"","shopOrder":"496076701001","taxAmount":0,"totalTransferNumber":"9405511898489821987974","trackNo":"","weight":1,"weightUnit":"LBS","zip":"","warehouseCode":"USDW"}';
        $orderJson1 = '{"amount":65,"batchNumber":"","bigHead":"","buyerAccount":"lshiqy","carrier":"XJJ","comment":"","country":"CN","currCode":"CNY","currentOperation":false,"declareMessage":"","declareModel":"BC","declareStatus":"","declareTime":null,"dutyPayby":"2","goodsAmount":65,"insuredValue":"","items":[{"amount":65,"country":"CN","goodsCode":"181440902871","goodsName":"16件套豪华修表工具（16-piece Deluxe Watch Repair Tool Kit Wrk001）","hsCode":"","itemTax":0,"netWeight":0,"orderNumber":"496076701002","price":65,"quantity":1,"saleCountry":"","taxRate":0,"unit":"","weight":1}],"logisticsFlag":false,"logisticsStatus":"","message":"","netWeight":0,"orderNumber":"XD170223002102","paymentCode":"","paymentNo":"","platformCode":"","postFee":0,"receiveMessage":"","receiverAddress":"望京西园2区慧谷时空219号楼1506","receiverAddressOne":"","receiverAddressTwo":"","receiverCountry":"CN","receiverCity":"北京市","receiverDistrict":"朝阳区","receiverId":"35052619901015062X","receiverMail":"","receiverMobile":"15011407373","receiverName":"钟琪瑜","receiverProvince":"北京","senderAddress":"street1 70 McCullough Dr #AA8000","senderAddressOne":"","senderAddressTwo":"","senderCity":"New Castle","senderDistrict":"","senderMobile":"302-604-5010","senderName":"USPS","senderNameOne":"","senderCountry":"US","senderProvince":"DE","senderZipCode":"","senderZipExt":"","service":"XJJ_A","shippingTime":null,"shopCode":"","shopOrder":"496076701002","taxAmount":0,"totalTransferNumber":"9405511898489821969178","trackNo":"","weight":1,"weightUnit":"LBS","zip":"","warehouseCode":"USDW"}';
        $orderJson = '{"amount":65,"batchNumber":"","bigHead":"","buyerAccount":"lshiq7","carrier":"XJJ","comment":"","country":"CN","currCode":"CNY","currentOperation":false,"declareMessage":"","declareModel":"BC","declareStatus":"","declareTime":null,"dutyPayby":"2","goodsAmount":65,"insuredValue":"","items":[{"amount":65,"country":"CN","goodsCode":"181440902871","goodsName":"16件套豪华修表工具（16-piece Deluxe Watch Repair Tool Kit Wrk001）","hsCode":"","itemTax":0,"netWeight":0,"orderNumber":"496076701003","price":65,"quantity":1,"saleCountry":"","taxRate":0,"unit":"","weight":1}],"logisticsFlag":false,"logisticsStatus":"","message":"","netWeight":0,"orderNumber":"XD170223002103","paymentCode":"","paymentNo":"","platformCode":"","postFee":0,"receiveMessage":"","receiverAddress":"西藏中路268号来福士广场办公楼16楼","receiverAddressOne":"","receiverAddressTwo":"","receiverCountry":"CN","receiverCity":"上海市","receiverDistrict":"黄浦区","receiverId":"350221198105053010","receiverMail":"","receiverMobile":"13816621266","receiverName":"郭清波","receiverProvince":"上海","senderAddress":"street1 70 McCullough Dr #AA8000","senderAddressOne":"","senderAddressTwo":"","senderCity":"New Castle","senderDistrict":"","senderMobile":"302-604-5010","senderName":"USPS","senderNameOne":"","senderCountry":"US","senderProvince":"DE","senderZipCode":"","senderZipExt":"","service":"XJJ_A","shippingTime":null,"shopCode":"","shopOrder":"496076701003","taxAmount":0,"totalTransferNumber":"9405511898489821969314","trackNo":"","weight":1,"weightUnit":"LBS","zip":"","warehouseCode":"USDW"}';
        $uspsorderJson = '{"amount":199,"batchNumber":"","bigHead":"","buyerAccount":"lshiqi","carrier":"USPS","comment":"","country":"US","currCode":"CNY","currentOperation":false,"declareMessage":"","declareModel":"UCS","declareStatus":"","declareTime":null,"dutyPayby":"2","goodsAmount":199,"insuredValue":"","items":[{"amount":199,"country":"US","goodsCode":"1001948","goodsName":"Snoreben 止鼾器","hsCode":"","itemTax":0,"netWeight":0,"orderNumber":"496076700046","price":199,"quantity":1,"saleCountry":"","taxRate":0,"unit":"","weight":1}],"logisticsFlag":false,"logisticsStatus":"","message":"","netWeight":0,"orderNumber":"XD170223002045","paymentCode":"","paymentNo":"","platformCode":"","postFee":0,"receiveMessage":"","receiverAddress":"光塔街道惠福西路进步里11号202房","receiverAddressOne":"","receiverAddressTwo":"","receiverCountry":"CN","receiverCity":"广州市","receiverDistrict":"越秀区","receiverId":"350203198909236754","receiverMail":"","receiverMobile":"13650828133","receiverName":"梁世琦","receiverProvince":"广东省","senderAddress":"3760 W CENTURY BLVD","senderAddressOne":"","senderAddressTwo":"","senderCity":"Inglewood","senderDistrict":"","senderMobile":"","senderName":"UCS","senderNameOne":"","senderCountry":"US","senderProvince":"CA","senderZipCode":"","senderZipExt":"","service":"USPS_A","shippingTime":null,"shopCode":"","shopOrder":"496076700045","taxAmount":0,"totalTransferNumber":"78787324299991","trackNo":"","weight":1,"weightUnit":"LBS","zip":"","warehouseCode":"USLAX"}';
        $declareType = 'ZEBRADIRECTMAIL';
        $params = array(
            'order'=>$orderJson,
            'declareType'=>$declareType
        );
        //echo self::DTS_DECLARE_URL."?".http_build_query($params);
        $result = CurlUtils::curlPost($params,self::DTS_DECLARE_URL);
        //$this->backLogistics($result);
        return $result;
    }

    /**
     * Return transfer order logistics to dss
     * @param string $result
     * @return string
     */
    public function backLogistics() :string{
/*        $resultArray = json_decode($result);
        $orderJSONArray = json_decode($resultArray->result);
        $orderInfo = json_encode($orderJSONArray->returnObject);
        $params = array(
            'order' =>$orderInfo
        );*/
        $params = array(
            'orderCode' => '9000000021582501'
        );
        $result = CurlUtils::curlPost($params,self::DTS_LOCAL_FIND_URL);
        return $result;
    }

    public function declaret(string $msgtype):string {
        $logistics_interface = '';
        $data_digest = "Mzg2NTU4M2Q5NTZjZGJiZWU0NDhkMWI0NTA1NmZkZTQ=";
        $msg_type = 'zebra.logistics.event.wms.create';
        $version = '1.0';
        $msg_id = '1490083768214';
        $params = array(
            'logistics_interface' =>$logistics_interface,
            'data_digest'=>base64_encode(md5($logistics_interface."123456")),
            'msg_type'=>'zebra.logistics.event.wms.create',
            'msg_id'=>'1490083768214',
            'version'=>'1.0'
        );
        echo base64_encode(md5("123456"."123456",1));
        $result = CurlUtils::curlPost($params,self::ZEBRA_TEST_URL);
        echo $result;
        return $result;
    }
}