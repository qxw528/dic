<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/7/17
 * Time: 2:56 PM
 */

namespace com\dic\framework\container;


class ContainerHelper
{

    /**
     * get the container
     */
    public static function getContainer():array {
        return Container::getSingleContainer();
    }

    /**
     * Put the instance to container
     * @param $containerKey
     * @param $containerInstance
     */
    public static function put($containerKey,$containerInstance) {
        self::getContainer()[$containerKey] = $containerInstance;
    }

    /**
     * Evict the instance by key
     * @param $containerKey
     */
    public static function evict($containerKey) {
        self::getContainer()[$containerKey] = null;
    }

    /**
     * Clear all the container
     */
    public static function ClearAll() {
        Container::clearAll();
    }

}