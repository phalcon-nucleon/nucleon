<?php

namespace App\Providers;

use App\Api\SomeApi;
use App\Constants\Services;
use Neutrino\Providers\Provider;

/**
 * Class Tumblr
 *
 * @package Lust\Bootstrap
 */
class SomeApiServices extends Provider
{
    protected $name = Services::SOME_API;

    protected $shared = false;

    public function register()
    {
        return new SomeApi();
    }
}
