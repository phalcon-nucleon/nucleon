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
    /**
     * The name of the service.
     *
     * @var string
     */
    protected $name = Services::EXAMPLE;

    /**
     * Specify if the service is shared (build as a singleton)
     *
     * @var string
     */
    protected $shared = false;

    /**
     * Specify the class of the service.
     *
     * @var string
     */
    protected $class = ExampleService::class;

    /**
     * Specify the aliases of the service, if needed.
     *
     * @var array
     */
    protected $aliases = [ExampleService::class];

    /**
     * Options to pass to the definition
     *
     * ex:
     * $options = [
     *  [
     *    'type' => 'service',
     *    'name' => 'cache'
     *  ],
     *  [
     *    'type' => 'instance',
     *    'className' => MyClass::class
     *  ],
     *  [
     *    'type' => 'parameter',
     *    'value' => true // false
     *  ],
     * ]
     *
     * @var array
     */
    protected $options;
}
