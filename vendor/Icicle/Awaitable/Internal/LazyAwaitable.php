<?php

/*
 * This file is part of Icicle, a library for writing asynchronous code in PHP using coroutines built with awaitables.
 *
 * @copyright 2014-2015 Aaron Piotrowski. All rights reserved.
 * @license MIT See the LICENSE file that was distributed with this source code for more information.
 */

namespace Icicle\Awaitable\Internal;

use Icicle\Awaitable\{Awaitable, function resolve, function reject};

class LazyAwaitable implements Awaitable
{
    use AwaitableMethods;
    
    /**
     * @var \Icicle\Awaitable\Awaitable|null
     */
    private $promise;
    
    /**
     * @var callable|null
     */
    private $promisor;
    
    /**
     * @param callable $promisor
     */
    public function __construct(callable $promisor)
    {
        $this->promisor = $promisor;
    }
    
    /**
     * @return \Icicle\Awaitable\Awaitable
     */
    protected function getAwaitable()
    {
        if (null === $this->promise) {
            $promisor = $this->promisor;
            $this->promisor = null;
            
            try {
                $this->promise = resolve($promisor());
            } catch (\Throwable $exception) {
                $this->promise = reject($exception);
            }
        }
        
        return $this->promise;
    }
    
    /**
     * {@inheritdoc}
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null): Awaitable
    {
        return $this->getAwaitable()->then($onFulfilled, $onRejected);
    }
    
    /**
     * {@inheritdoc}
     */
    public function done(callable $onFulfilled = null, callable $onRejected = null)
    {
        $this->getAwaitable()->done($onFulfilled, $onRejected);
    }
    
    /**
     * {@inheritdoc}
     */
    public function cancel(\Throwable $reason = null)
    {
        $this->getAwaitable()->cancel($reason);
    }
    
    /**
     * {@inheritdoc}
     */
    public function timeout(float $timeout, callable $onTimeout = null): Awaitable
    {
        return $this->getAwaitable()->timeout($timeout, $onTimeout);
    }
    
    /**
     * {@inheritdoc}
     */
    public function delay(float $time): Awaitable
    {
        return $this->getAwaitable()->delay($time);
    }
    
    /**
     * {@inheritdoc}
     */
    public function isPending(): bool
    {
        return $this->getAwaitable()->isPending();
    }
    
    /**
     * {@inheritdoc}
     */
    public function isFulfilled(): bool
    {
        return $this->getAwaitable()->isFulfilled();
    }
    
    /**
     * {@inheritdoc}
     */
    public function isRejected(): bool
    {
        return $this->getAwaitable()->isRejected();
    }

    /**
     * {@inheritdoc}
     */
    public function isCancelled(): bool
    {
        return $this->getAwaitable()->isCancelled();
    }

    /**
     * {@inheritdoc}
     */
    public function uncancellable(): Awaitable
    {
        return new UncancellableAwaitable($this);
    }

    /**
     * {@inheritdoc}
     */
    public function wait()
    {
        return $this->getAwaitable()->wait();
    }
}
