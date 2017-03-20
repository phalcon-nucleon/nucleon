<?php

namespace App\Kernels\Cli;

use Neutrino\Foundation\Cli\Kernel as CliKernel;
use Neutrino\Foundation\Middleware\Debug as DebugMiddleware;
use Neutrino\Providers\Cli\Dispatcher as DispatcherProvider;
use Neutrino\Providers\Cli\Router as RouterProvider;
use Neutrino\Providers\Database as DatabaseProvider;
use Neutrino\Providers\Logger as LoggerProvider;

/**
 * Class Kernel
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class Kernel extends CliKernel
{
    /**
     * Return the Provider List to load.
     *
     * @var string[]
     */
    protected $providers = [
        /*
         * Basic Configuration
         */
        LoggerProvider::class,
        RouterProvider::class,
        DispatcherProvider::class,
        DatabaseProvider::class,
        /*
         * Service provided by the Phalcon\Di\FactoryDefault
         *
        \Neutrino\Providers\Models::class,
        \Neutrino\Providers\Cookies::class,
        \Neutrino\Providers\Filter::class,
        \Neutrino\Providers\Escaper::class,
        \Neutrino\Providers\Security::class,
        \Neutrino\Providers\Crypt::class,
        \Neutrino\Providers\Annotations::class,
        /**/
    ];

    /**
     * Return the Middleware List to load.
     *
     * @var string[]
     */
    protected $middlewares = [
        DebugMiddleware::class
    ];
}
