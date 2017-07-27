<?php
/*
 * Go! AOP framework
 *
 * @copyright Copyright 2012, Lisachenko Alexander <lisachenko.it@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 */

use Demo\Aspect\AwesomeAspectKernel;
use Go\Aop\Features;

include_once __DIR__ . '/../bootstrap/autoload.php';

// Initialize demo aspect container
AwesomeAspectKernel::getInstance()->init(array(
    'debug'    => true,
    'appDir'   => __DIR__ . '/../Demo',
    'cacheDir' => __DIR__ . '/cache',

    'features' => Features::INTERCEPT_FUNCTIONS,
));
