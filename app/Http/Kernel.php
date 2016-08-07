<?php

namespace App\Http;

use App\Providers\SomeApiServices as SomeApiProvider;
use Luxury\Foundation\Application\Http as HttpApplication;
use Luxury\Foundation\Middleware\Debug as DebugMiddleware;
use Luxury\Http\Middleware\Throttle as ThrottleMiddleware;
use Luxury\Providers\Auth as AuthProvider;
use Luxury\Providers\Config as ConfigProvider;
use Luxury\Providers\Database as DatabaseProvider;
use Luxury\Providers\Flash as FlashProvider;
use Luxury\Providers\Http\Dispatcher as DispatcherProvider;
use Luxury\Providers\Http\Router as RouterProvider;
use Luxury\Providers\HttpClient as HttpClientProvider;
use Luxury\Providers\Logger as LoggerProvider;
use Luxury\Providers\Session as SessionProvider;
use Luxury\Providers\Url as UrlProvider;
use Luxury\Providers\View as ViewProvider;

/**
 * Class Kernel
 *
 * @package App\Http\Controllers
 */
class Kernel extends HttpApplication
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
        UrlProvider::class,
        FlashProvider::class,
        SessionProvider::class,
        RouterProvider::class,
        ViewProvider::class,
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
        DebugMiddleware::class,
        ThrottleMiddleware::class
    ];

    /**
     * Register the routes of the application.
     */
    public function registerRoutes()
    {
        $router = $this->router;

        $config = $this->config;

        $base = isset($config->application->baseUri) ? $config->application->baseUri : '/';

        $router->setDefaultNamespace('App\Http\Controllers');

        $router->notFound([
            'controller' => 'errors',
            'action'     => 'http404'
        ]);

        $router->addGet($base, [
            'controller' => 'index',
            'action'     => 'index'
        ]);

        $router->addGet($base . 'forward', [
            'controller' => 'index',
            'action'     => 'forward'
        ]);

        $router->addPost($base . 'auth/login', [
            'controller' => 'auth',
            'action'     => 'login'
        ]);
    }
}
