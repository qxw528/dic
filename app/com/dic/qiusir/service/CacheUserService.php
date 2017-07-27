<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/26/17
 * Time: 4:53 PM
 */

namespace com\dic\qiusir\service;


class CacheUserService extends UserService
{
    /**
     * @param int $id
     * @return int
     */
    public function findCacheById(int $id):int {
        return $this->findById($id);
    }
}