<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/26/17
 * Time: 4:02 PM
 */

namespace com\dic\qiusir\service;


class UserService extends DecoratorService
{

    public function findById(int $id) :int {
        return $id;
    }

    public function findByName(string $name) :string {
        return $name;
    }
}