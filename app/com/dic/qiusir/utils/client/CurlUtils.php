<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 4:37 PM
 */

namespace com\dic\qiusir\utils\client;


use com\dic\qiusir\utils\client\constant\Constant;

class CurlUtils
{
    public static $TIMEOUT = 120000;
    public static $AGENT = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)';

    /**
     * Curl connect to server through get type
     * @param string $url
     * @return string
     */
    public static function curlGet(string $url):string{
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,self::$TIMEOUT);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through get type addition timeout
     * @param string $url
     * @param int $timeout
     * @return string
     */
    public static function curlGetAddTimeout(string $url,int $timeout):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $timeout = $timeout ?? self::$TIMEOUT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
        $result = curl_exec($curl);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through get type addition agent
     * @param string $url
     * @param string $agent
     * @return string
     */
    public static function curlGetAddAgent(string $url,string $agent):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $agent = $agent ?? self::$AGENT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,self::$TIMEOUT);
        curl_setopt($curl,CURLOPT_USERAGENT,$agent);
        $result = curl_exec($curl);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through get type addition timeout and agent
     * @param string $url
     * @param int $timeout
     * @param string $agent
     * @return mixed
     */
    public static function curlGetAddAgentAndTimeout(string $url,int $timeout,string $agent):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $agent = $agent ?? self::$AGENT;
        $timeout = $timeout ?? self::$TIMEOUT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
        curl_setopt($curl,CURLOPT_USERAGENT,$agent);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through post type
     * @param array $params
     * @param string $url
     * @return mixed
     */
    public static function curlPost(array $params,string $url):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($params));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        //curl_setopt($curl,CURLOPT_TIMEOUT,self::$TIMEOUT);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through post type addition timeout
     * @param array $params
     * @param string $url
     * @param int $timeout
     * @return mixed
     */
    public static function curlPostAddTimeout(array $params,string $url,int $timeout):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $timeout = $timeout ?? self::$TIMEOUT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,count($params));
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($params));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through post type addition agent
     * @param array $params
     * @param string $url
     * @param string $agent
     * @return mixed
     */
    public static function curlPostAddAgent(array $params,string $url,string $agent):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $agent = $agent ?? self::$AGENT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,count($params));
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($params));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_USERAGENT,$agent);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

    /**
     * Curl connect to server through post type add timeout and agent
     * @param array $params
     * @param string $url
     * @param int $timeout
     * @param string $agent
     * @return mixed
     */
    public static function curlPostAddTimeAndAgent(array $params,string $url,int $timeout,string $agent):string {
        $returnArray = array(
            'code' => Constant::SUCCESS
        );
        $curl = curl_init();
        $agent = $agent ?? self::$AGENT;
        $timeout = $timeout ?? self::$TIMEOUT;
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POST,count($params));
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($params));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_TIMEOUT,$timeout);
        curl_setopt($curl,CURLOPT_USERAGENT,$agent);
        $result = curl_exec($curl);
        if ($result === false) {
            $returnArray['code'] = Constant::ERROR;
            $returnArray['result'] = curl_error($curl);
        } else {
            $returnArray['result'] = $result;
        }
        curl_close($curl);
        return json_encode($returnArray);
    }

}