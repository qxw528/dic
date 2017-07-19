<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/15/17
 * Time: 11:18 AM
 */

namespace com\dic\qiusir\reflect;


class Reflection
{
    /**
     * get the document comment of class name
     * @param string $className
     * @return string
     */
    public function getClassComment(string $className):string {
        $reflector = new \ReflectionClass($className);
        return $reflector->getDocComment();
    }

    /**
     * get the function's document comment of class
     * @param string $className
     * @return array
     */
    public function getMethodComment(string $className):array {
        $methodsComment = array();
        $reflector = new \ReflectionClass($className);
        $classMethods = $reflector->getMethods();
        foreach ($classMethods as $key=>&$classMethod) {
            $methodsComment[$classMethod] = $reflector->getMethod($classMethod)->getDocComment();
        }
        return $methodsComment;
    }

    /**
     *
     */
    public function getMethodParameters(string $className,string $methodName):array {
        $reflector = new \ReflectionClass($className);
        $parameters = $reflector->getMethod($methodName)->getParameters();
        return $parameters;
    }

    /**
     * get the properties's comment  of class
     * @param string $className
     * @return array
     */
    public function getPropertyComment(string $className):array {
        $propertiesComment = array();
        $reflector = new \ReflectionClass($className);
        $properties = $reflector->getProperties();
        foreach ($properties as $key=>&$property) {
            $propertiesComment[$property] = $reflector->getProperty($property)->getDocComment();
        }
        return $propertiesComment;
    }

    /**
     * get the all comment of class
     * @param string $className
     * @return array
     */
    public function getAllComment(string $className):array {
        $comments = array();
        $reflector = new \ReflectionClass($className);
        $comments['CLASS'] = $reflector->getDocComment();
        $methods = $reflector->getMethods();
        $methodsComment = array();
        foreach ($methods as $method) {
            $methodsComment[$method] = $reflector->getMethod($method)->getDocComment();
        }
        $comments['METHOD'] = $methodsComment;
        $properties = $reflector->getProperties();
        $propertiesComment = array();
        foreach ($properties as $property) {
            $propertiesComment[$property] = $reflector->getProperty($property)->getDocComment();
        }
        $comments['PROPERTY'] = $propertiesComment;
        return $comments;
    }

}