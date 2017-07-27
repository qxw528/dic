<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/27/17
 * Time: 10:38 AM
 */

namespace com\dic\framework\aspect;


use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;
use com\dic\qiusir\service\CacheUserService;

class MonitorAspect implements Aspect
{
    /**
     * Method that will be called before real method
     *
     * @param MethodInvocation $invocation Invocation
     * @Pointcut("execution(public com\dic\qiusir\service\CacheUserService->*(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation) {
        $obj =   $invocation ->getThis();
        echo 'Calling Before Interceptor for method: ',
        is_object($obj) ? get_class($obj) : $obj,
        $invocation->getMethod()->isStatic() ? '::' : '->',
        $invocation->getMethod()->getName(),
        '()',
        ' with arguments: ',
        json_encode($invocation->getArguments()),
        "<br>\n";
    }

}