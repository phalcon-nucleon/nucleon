<?php

namespace App\Providers;

use App\Api\SomeApi;
use App\Constants\Services;
use Luxury\Interfaces\Providable;
use Phalcon\DiInterface;

/**
 * Class Tumblr
 *
 * @package Lust\Bootstrap
 */
class SomeApiServices implements Providable
{
    /**
     * @param \Phalcon\DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di)
    {
        /**
         * Register the service of "SomeApi"
         */
        $di->setShared(Services::SOME_API, function () {
            $api = new SomeApi();

            $api->setDI($this);

            return $api;
        });
    }
}
