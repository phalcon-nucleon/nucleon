<?php

declare(strict_types=1);

namespace App\Core\Providers;

use App\Core\Constants\Services;
use App\Core\Services\Example as ExampleService;
use Neutrino\Support\SimpleProvider;

/**
 * Registers ExampleService under the name `example` (and its class).
 */
class Example extends SimpleProvider
{
    protected string $name = Services::EXAMPLE;

    /**
     * Shared: built once (a singleton).
     */
    protected bool $shared = false;

    protected string $class = ExampleService::class;

    protected array $aliases = [ExampleService::class];

    /**
     * Arguments of the constructor, as Phalcon service definitions:
     * ['type' => 'service', 'name' => 'cache'], ['type' => 'instance', 'className' => MyClass::class],
     * ['type' => 'parameter', 'value' => true].
     */
    protected array $options = [];
}
