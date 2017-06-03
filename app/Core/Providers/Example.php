<?php

namespace App\Core\Providers;

use App\Core\Services\Example as ExampleService;
use App\Core\Constants\Services;
use Neutrino\Providers\BasicProvider;

/**
 * Class SomeApi
 *
 * @package App\Core\Providers
 */
class Example extends BasicProvider
{
    protected $name = Services::EXAMPLE;

    protected $shared = false;

    protected $class = ExampleService::class;

    protected $aliases = [ExampleService::class];
}
