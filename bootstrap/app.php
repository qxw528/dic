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
            $method = $_REQUEST['md'] ?? 'request';
            if ($this->checkClassMethod($reflectClass,$method)) {
                $reflectMethod = new \ReflectionMethod($className,$method);
            } else {
                $reflectMethod = new \ReflectionMethod($className,'request');
            }
            $classInstance = new $className();
            $result = $reflectMethod->invokeArgs($classInstance,array(strtoupper($msgType)));
            echo json_encode($result,1);
        }
    }

    public function checkClassMethod(\ReflectionClass $reflectionClass,string $method):bool {
        $methods = $reflectionClass->getMethods();
        foreach ($methods as $methodName) {;
            if ($methodName->getName() === $method) {
                return true;
            }
        }
        return false;
    }
}

$app = new App();
$app->run();