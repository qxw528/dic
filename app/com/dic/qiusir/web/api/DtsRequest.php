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
    const SECRET = '97d2efb3-beec-4cbf-a0fd-90da29cde467';
    const DTS_URL = 'http://192.168.15.244:8080/dts/api/v1/transport/receivezebra';

    public function request(string $msgType):string {
        $zebraMap = ZebraMessgeTypeEnum::getEnumMap();
        $deMsgType = $zebraMap[$msgType] ?? 'zebra.logistics.event.wms.checkorder';
        $message = file_get_contents(ROOT_PATH.'/config/dts/zebra/'.$msgType.'.xml');
        $dataDigest = base64_encode(md5($message.self::SECRET));
        $appKey = 'zebramaster';
        $params = array(
            'logistics_interface' =>$message,
            'msg_type' =>$deMsgType,
            'data_digest' => $dataDigest,
            'app_key' =>$appKey,
            'msg_id' => time()."",
            'version' => '1,0'
        );
        var_dump($params);
        $result = CurlUtils::curlPost($params,self::DTS_URL);
        echo $result;
        return $result;
    }
}