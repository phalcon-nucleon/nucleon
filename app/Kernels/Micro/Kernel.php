<?php

declare(strict_types=1);

namespace App\Kernels\Micro;

use App\Core\Providers\Example as ExampleProvider;
use Neutrino\Foundation\Micro\Kernel as MicroKernel;
use Neutrino\Providers;

class Kernel extends MicroKernel
{
    /**
     * The providers: their services are built on first use.
     */
    protected array $providers = [
        Providers\Logger::class,
        Providers\Url::class,
        Providers\Micro\Router::class,
        Providers\Database::class,
        Providers\Model::class,
        Providers\Cache::class,
        Providers\Crypt::class,
        Providers\HttpClient::class,

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
}
