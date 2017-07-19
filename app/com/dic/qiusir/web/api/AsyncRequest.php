<?php
/**
 * Created by PhpStorm.
 * User: qiusir
 * Date: 3/20/17
 * Time: 3:28 PM
 */

namespace com\dic\qiusir\web\api;

use Icicle\Awaitable;
use Icicle\Coroutine\Coroutine;
use Icicle\Awaitable\Promise;
use Icicle\Loop;

class AsyncRequest
{

    /**
     * AsyncRequest constructor.
     */
    public function __construct()
    {
        require_once ROOT_PATH.'/vendor/Icicle/functions.php';
        require_once ROOT_PATH.'/vendor/Icicle/Loop/functions.php';
        require_once ROOT_PATH.'/vendor/Icicle/Coroutine/functions.php';
        require_once ROOT_PATH.'/vendor/Icicle/Awaitable/functions.php';
        require_once ROOT_PATH.'/vendor/Icicle/Observable/functions.php';
    }

    public function request(string $method):string {
        $generator = function () {
            try {
                // Sets $start to the value returned by microtime() after approx. 1 second.
                $start = (yield Awaitable\resolve(microtime(true))->delay(1));

                echo "Sleep time: ", microtime(true) - $start, "\n";

                // Throws the exception from the rejected promise into the coroutine.
                yield Awaitable\reject(new \Exception('Rejected promise'));
            } catch (Exception $e) { // Catches promise rejection reason.
                echo "Caught exception: ", $e->getMessage(), "\n";
            }

            yield Awaitable\resolve('Coroutine completed');
        };

        $coroutine = new Coroutine($generator());

        $coroutine->done(function ($data) {
            echo $data, "\n";
        });

        Loop\run();
    }

    public function promise() {
        $promise = new Promise(function (callable $resolve, callable $reject) {
            Loop\timer(10, function () use ($resolve) {
                $resolve("Promise resolved");
            });
        });
        $start = microtime(true);
        $promise
            ->then(function ($data) use ($start) {
                return sprintf("%s after %4f seconds.\n", $data, microtime(true) - $start);
            })
            ->done(function ($data) {
                file_put_contents(ROOT_PATH.'/test.txt',"2222222222222");
                echo $data;
            });
        Loop\run();
    }
}