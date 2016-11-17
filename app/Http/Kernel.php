<?php

namespace App\Http;

use App\Providers\SomeApiServices as SomeApiProvider;
use Luxury\Foundation\Http\Kernel as HttpKernel;
use Luxury\Providers\Auth as AuthProvider;
use Luxury\Providers\Cache as CacheProvider;
use Luxury\Providers\Database as DatabaseProvider;
use Luxury\Providers\Flash as FlashProvider;
use Luxury\Providers\Http\Dispatcher as DispatcherProvider;
use Luxury\Providers\Http\Router as RouterProvider;
use Luxury\Providers\Logger as LoggerProvider;
use Luxury\Providers\Session as SessionProvider;
use Luxury\Providers\Url as UrlProvider;
use Luxury\Providers\View as ViewProvider;

/**
 * Class Kernel
 *
 * @package App\Http\Controllers
 */
class Kernel extends HttpKernel
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
        FlashProvider::class,
        SessionProvider::class,
        RouterProvider::class,
        ViewProvider::class,
        DispatcherProvider::class,
        DatabaseProvider::class,
        CacheProvider::class,

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
         * Auth Service
         */
        AuthProvider::class,

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
        // DebugMiddleware::class
    ];

    /**
     * Return the Events Listeners to attach onto the application.
     *
     * @var string[]
     */
    protected $listeners = [];
}
