<?php

namespace App\Kernels\Micro;

use App\Core\Providers\Example as ExampleProvider;
use Neutrino\Foundation\Micro\Kernel as MicroKernel;
use Neutrino\Interfaces\Kernelable;
use Neutrino\Providers\Cache as CacheProvider;
use Neutrino\Providers\Database as DatabaseProvider;
use Neutrino\Providers\Http\Dispatcher as DispatcherProvider;
use Neutrino\Providers\Http\Router as RouterProvider;
use Neutrino\Providers\Micro\Router as MicroRouterProvider;
use Neutrino\Providers\Logger as LoggerProvider;
use Neutrino\Providers\Session as SessionProvider;
use Neutrino\Providers\Url as UrlProvider;

class Kernel extends MicroKernel implements Kernelable
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
        UrlProvider::class,
        SessionProvider::class,
        RouterProvider::class,
        DispatcherProvider::class,
        DatabaseProvider::class,
        CacheProvider::class,

        MicroRouterProvider::class,
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

        /*
         * Application Services
         */
        ExampleProvider::class,
    ];

    /**
     * Return the Middleware List to load.
     *
     * @var string[]
     */
    protected $middlewares = [
        // DebugMiddleware::class
    ];

    /**
     * Return the Events Listeners to attach onto the application.
     *
     * @var string[]
     */
    protected $listeners = [];
}
