<?php

namespace App\Cli;

use App\Providers\SomeApiServices as SomeApiProvider;
use Luxury\Foundation\Application\Cli as CliApplication;
use Luxury\Foundation\Middleware\Debug as DebugMiddleware;
use Luxury\Providers\Cli\Dispatcher as DispatcherProvider;
use Luxury\Providers\Cli\Router as RouterProvider;
use Luxury\Providers\Config as ConfigProvider;
use Luxury\Providers\Database as DatabaseProvider;
use Luxury\Providers\HttpClient as HttpClientProvider;
use Luxury\Providers\Logger as LoggerProvider;
use Phalcon\Cli\Router;

/**
 * Class Kernel
 *
 * @package App\Http\Controllers
 */
class Kernel extends CliApplication
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
        ConfigProvider::class,
        LoggerProvider::class,
        RouterProvider::class,
        DispatcherProvider::class,
        DatabaseProvider::class,
        /*
         * Service provided by the Phalcon\Di\FactoryDefault
         *
        \Luxury\Providers\Models::class,
        \Luxury\Providers\Cookies::class,
        \Luxury\Providers\Filter::class,
        \Luxury\Providers\Escaper::class,
        \Luxury\Providers\Security::class,
        \Luxury\Providers\Crypt::class,
        \Luxury\Providers\Annotations::class,
        /**/

        /*
         * Http Client
         */
        HttpClientProvider::class,

        /*
         * SomeApi Service
         */
        SomeApiProvider::class
    ];

    /**
     * Return the Middleware List to load.
     *
     * @var string[]
     */
    protected $middlewares = [
        DebugMiddleware::class
    ];

    /**
     * Register the routes of the application.
     */
    public function registerRoutes()
    {
    }
}
