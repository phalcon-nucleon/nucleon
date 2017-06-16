<?php

namespace App\Kernels\Http;

use App\Core\Providers\Example as ExampleProvider;
use App\Kernels\Http\Modules\Backend\Module as BackendModule;
use App\Kernels\Http\Modules\Frontend\Module as FrontendModule;
use Neutrino\Foundation\Http\Kernel as HttpKernel;
use Neutrino\Providers\Auth as AuthProvider;
use Neutrino\Providers\Cache as CacheProvider;
use Neutrino\Providers\Database as DatabaseProvider;
use Neutrino\Providers\Flash as FlashProvider;
use Neutrino\Providers\Http\Dispatcher as DispatcherProvider;
use Neutrino\Providers\Http\Router as RouterProvider;
use Neutrino\Providers\Logger as LoggerProvider;
use Neutrino\Providers\Session as SessionProvider;
use Neutrino\Providers\Url as UrlProvider;
use Neutrino\Providers\View as ViewProvider;

/**
 * Class Kernel
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
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
        \Neutrino\Providers\Models::class,
        \Neutrino\Providers\Cookies::class,
        \Neutrino\Providers\Filter::class,
        \Neutrino\Providers\Escaper::class,
        \Neutrino\Providers\Security::class,
        \Neutrino\Providers\Crypt::class,
        \Neutrino\Providers\Annotations::class,
        /**/

        /*
         * Auth Service
         */
        AuthProvider::class,

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

    /**
     * List of modules
     *
     * @var array
     */
    protected $modules = [
        'Frontend' => [
            'className' => FrontendModule::class,
            'path'      => BASE_PATH . '/app/Kernels/Http/Modules/Frontend/Module.php'
        ],
        'Backend' => [
            'className' => BackendModule::class,
            'path'      => BASE_PATH . '/app/Kernels/Http/Modules/Backend/Module.php'
        ]
    ];
}
