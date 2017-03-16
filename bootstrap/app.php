<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 11:13 AM
 */

class App {

    public function run(){
        $api = $_REQUEST['api'] ?? '';
        if ($api) {
            $api = ucfirst($api).'Request';
            $msgType = $_REQUEST['msgType'] ?? 'WMS_CHECK_ORDER';
            $className = 'com\dic\qiusir\web\api\\'.$api;
            $reflectClass = new \ReflectionClass($className);
            $reflectMehtod = new \ReflectionMethod($className,'request');
            $classInstance = new $className();
            $reflectMehtod->invokeArgs($classInstance,array(strtoupper($msgType)));
        }
    }
}

$app = new App();
$app->run();