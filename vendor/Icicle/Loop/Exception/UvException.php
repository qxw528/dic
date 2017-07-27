<?php

/*
 * This file is part of Icicle, a library for writing asynchronous code in PHP using promises and coroutines.
 *
 * @copyright 2014-2015 Aaron Piotrowski. All rights reserved.
 * @license MIT See the LICENSE file that was distributed with this source code for more information.
 */

namespace Icicle\Loop\Exception;

/**
 * Throws an unexpected libuv error as an exception.
 */
class UvException extends \Exception
{
    public function __construct(int $errorCode)
    {
        parent::__construct(
            sprintf('UV_%s: %s', \uv_err_name($errorCode), \ucfirst(\uv_strerror($errorCode))),
            $errorCode
        );
    }
}
