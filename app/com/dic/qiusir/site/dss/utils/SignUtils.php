<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 6/15/17
 * Time: 4:28 PM
 */

namespace com\dic\qiusir\site\dss\utils;


class SignUtils
{
    /**
     * generate sign key through params
     * @param array $params
     * @param string $appSecret
     * @return string
     */
    public static function generate(array $params,string $appSecret) :string {
        ksort($params);
        $sign = '';
        foreach ($params as $key=>$value) {
            if ($key == 'sign') {
                continue;
            } else {
                if ($value) {
                    $sign .= $key .'='.$value.'&';
                }
            }
        }
        $sign = substr($sign,0,strlen($sign)-1);
        //echo $sign.$appSecret;
        return md5($sign.$appSecret);
    }
}