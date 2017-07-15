<?php

namespace App\Core\Providers;

use App\Core\Services\Example as ExampleService;
use App\Core\Constants\Services;
use Neutrino\Support\SimpleProvider;

/**
 * Class SomeApi
 *
 * @package App\Core\Providers
 */
class Example extends SimpleProvider
{
    protected $name = Services::EXAMPLE;

    protected $shared = false;

    protected $class = ExampleService::class;

    protected $aliases = [ExampleService::class];
}
