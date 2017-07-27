<?php

/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 7/26/17
 * Time: 5:25 PM
 */
use Go\Core\AspectKernel;
use Go\Core\AspectContainer;

use com\dic\framework\aspect\MonitorAspect;
use Demo\Aspect\LoggingAspect;

class ApplicationAspectKernel extends AspectKernel
{

    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param \Go\Core\AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        // TODO: Implement configureAop() method.
        //$container->registerAspect(new MonitorAspect());
        $container->registerAspect(new LoggingAspect());
    }
}