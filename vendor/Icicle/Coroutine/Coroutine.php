<?php

/*
 * This file is part of Icicle, a library for writing asynchronous code in PHP using coroutines built with awaitables.
 *
 * @copyright 2014-2015 Aaron Piotrowski. All rights reserved.
 * @license MIT See the LICENSE file that was distributed with this source code for more information.
 */

namespace Icicle\Coroutine;

use Generator;
use Icicle\Awaitable\{Awaitable, Future};
use Icicle\Coroutine\Exception\{AwaitableReturnedError, GeneratorReturnedError, TerminatedException};
use Icicle\Loop;
use Throwable;

/**
 * This class implements cooperative coroutines using Generators. Coroutines should yield awaitables to pause execution
 * of the coroutine until the awaitable has resolved. If the awaitable is fulfilled, the fulfillment value is sent to
 * the generator. If the awaitable is rejected, the rejection exception is thrown into the generator.
 */
final class Coroutine extends Future
{
    /**
     * @var \Generator
     */
    private $generator;

    /**
     * @var \Closure
     */
    private $send;
    
    /**
     * @var \Closure
     */
    private $capture;

    /**
     * @var mixed
     */
    private $current;

    /**
     * @var bool
     */
    private $busy = false;

    /**
     * @param \Generator $generator
     */
    public function __construct(Generator $generator)
    {
        parent::__construct();

        $this->generator = $generator;

        /**
         * @param mixed $value The value to send to the generator.
         */
        $this->send = function ($value = null) {
            if ($this->busy) {
                Loop\queue($this->send, $value); // Queue continuation to avoid blowing up call stack.
                return;
            }

            try {
                // Send the new value and execute to next yield statement.
                $this->next($this->generator->send($value));
            } catch (Throwable $exception) {
                $this->reject($exception);
            }
        };

        /**
         * @param \Throwable $exception Exception to be thrown into the generator.
         */
        $this->capture = function (Throwable $exception) {
            if ($this->busy) {
                Loop\queue($this->capture, $exception); // Queue continuation to avoid blowing up call stack.
                return;
            }

            try {
                // Throw exception at current execution point.
                $this->next($this->generator->throw($exception));
            } catch (Throwable $exception) {
                $this->reject($exception);
            }
        };

        try {
            $this->next($this->generator->current());
        } catch (Throwable $exception) {
            $this->reject($exception);
        }
    }

    /**
     * Examines the value yielded from the generator and prepares the next step in interation.
     *
     * @param mixed $yielded
     */
    private function next($yielded)
    {
        if (!$this->generator->valid()) {
            $result = $this->generator->getReturn();

            if ($result instanceof Awaitable) {
                $this->reject(new AwaitableReturnedError($result));
                return;
            }

            if ($result instanceof Generator) {
                $this->reject(new GeneratorReturnedError($result));
                return;
            }

            $this->resolve($result);
            return;
        }

        $this->busy = true;

        if ($yielded instanceof Generator) {
            $yielded = new self($yielded);
        }

        $this->current = $yielded;

        if ($yielded instanceof Awaitable) {
            $yielded->done($this->send, $this->capture);
        } else {
            Loop\queue($this->send, $yielded);
        }

        $this->busy = false;
    }

    /**
     * {@inheritdoc}
     */
    public function cancel(Throwable $reason = null)
    {
        if (!$this->isPending()) {
            return;
        }

        if (null === $reason) {
            $reason = new TerminatedException();
        }

        parent::cancel($reason);

        if ($this->current instanceof Awaitable) {
            $this->current->cancel($reason); // Will continue execution by throwing into the generator.
        }
    }
}
