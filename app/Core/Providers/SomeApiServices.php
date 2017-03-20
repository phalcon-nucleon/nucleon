<?php

namespace App\Core\Providers;

use App\Core\Api\SomeApi;
use App\Core\Constants\Services;
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
