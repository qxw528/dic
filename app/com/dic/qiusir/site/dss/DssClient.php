<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 4:44 PM
 */

namespace com\dic\qiusir\site\dss;


use com\dic\qiusir\site\Client;
use com\dic\qiusir\site\dss\utils\SignUtils;
use com\dic\qiusir\site\Request;
use com\dic\qiusir\site\Response;

class DssClient implements Client
{
    public $url;
    public $appKey;
    public $appSecret;
    public $appToken;
    public $connectTimeout;
    public $readTimeout;
    public $httpType = 'POST';

    public function __construct($url,$appKey,$appSecret)
    {
        $this->url = $url;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    public function instance($url,$appKey,$appSecret,$appToken)
    {
        self::__construct($url,$appKey,$appSecret);
        $this->appToken = $appToken;
    }



    public function execute(Request $request):Response
    {
        // TODO: Implement execute() method.
        $sysParams = $request->getSysParams();
        $sysParams['appKey'] = $this->appKey;
        $appParams = $request->getAppParams();
        $params = array_merge($sysParams,$appParams);
        $sign = SignUtils::generate($params,$this->appSecret);
        $params['sign'] = $sign;
        $postData = http_build_query($params);
        $ch = curl_init($this->url);
        //curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_0);
        //curl_setopt($ch,CURLOPT_HTTPHEADER,array("Expect:"));
        curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postData);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        $result = curl_exec($ch);
        curl_close($ch);
        $resultArray = json_decode($result,true);
        $responseClass = $request->getResponseClass();
        $response = new $responseClass();
        $reflectResponse = new \ReflectionClass($request->getResponseClass());
        foreach ($reflectResponse->getProperties() as $property) {
            $propertyName = $property->getName();
            $setName = 'set'.ucfirst($propertyName);
            if (key_exists($propertyName,$resultArray)) {
                $response->$setName($resultArray[$propertyName]);
            }
        }
        return $response;
    }

    public function notify(Request $request):Response
    {
        // TODO: Implement execute() method.
        $appParams = $request->getAppParams();
        foreach ($appParams as $key=>$value) {
            if (is_array($value)) {
                $appParams[$key] = json_encode($value);
            }
        }
        $postData = http_build_query($appParams);
        $ch = curl_init($this->url);
        //curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_0);
        //curl_setopt($ch,CURLOPT_HTTPHEADER,array("Expect:"));
        curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postData);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        $result = curl_exec($ch);
        curl_close($ch);
        $resultArray = json_decode($result,true);
        $responseClass = $request->getResponseClass();
        $response = new $responseClass();
        $reflectResponse = new \ReflectionClass($request->getResponseClass());
        foreach ($reflectResponse->getProperties() as $property) {
            $propertyName = $property->getName();
            $setName = 'set'.ucfirst($propertyName);
            if (key_exists($propertyName,$resultArray)) {
                $response->$setName($resultArray[$propertyName]);
            }
        }
        return $response;
    }
}