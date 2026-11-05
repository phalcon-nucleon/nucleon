<?php

declare(strict_types=1);

namespace App\Kernels\Http;

use App\Core\Providers\Example as ExampleProvider;
use App\Kernels\Http\Modules\Backend\Module as BackendModule;
use App\Kernels\Http\Modules\Frontend\Module as FrontendModule;
use Neutrino\Foundation\Http\Kernel as HttpKernel;
use Neutrino\Providers;

class Kernel extends HttpKernel
{
    /**
     * The providers: their services are built on first use.
     */
    protected array $providers = [
        Providers\Logger::class,
        Providers\Url::class,
        Providers\Flash::class,
        Providers\FlashSession::class,
        Providers\Session::class,
        Providers\Http\Router::class,
        Providers\View::class,
        Providers\Http\Dispatcher::class,
        Providers\Database::class,
        Providers\Model::class,
        Providers\Cache::class,
        Providers\Crypt::class,
        Providers\Security::class,
        Providers\HttpClient::class,
        Providers\Auth::class,

        // Application services
        ExampleProvider::class,
    ];

    /**
     * The global middlewares, attached to the application.
     */
    protected array $middlewares = [];

    /**
     * The events listeners, attached to the application.
     */
    protected array $listeners = [];

    protected array $modules = [
        'Frontend' => [
            'className' => FrontendModule::class,
            'path'      => BASE_PATH . '/app/Kernels/Http/Modules/Frontend/Module.php',
        ],
        'Backend' => [
            'className' => BackendModule::class,
            'path'      => BASE_PATH . '/app/Kernels/Http/Modules/Backend/Module.php',
        ],
    ];
}
