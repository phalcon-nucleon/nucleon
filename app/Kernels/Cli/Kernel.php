<?php

declare(strict_types=1);

namespace App\Kernels\Cli;

use App\Core\Providers\Example as ExampleProvider;
use Neutrino\Database\Providers\MigrationsServicesProvider;
use Neutrino\Foundation\Cli\Kernel as CliKernel;
use Neutrino\Providers;

class Kernel extends CliKernel
{
    /**
     * The providers: their services are built on first use. A provider implementing
     * Neutrino\Cli\ProvidesTasks also declares its commands (the migrations here).
     */
    protected array $providers = [
        Providers\Cli\Output::class,
        Providers\Logger::class,
        Providers\Cli\Router::class,
        Providers\Cli\Dispatcher::class,
        Providers\Database::class,
        Providers\Model::class,
        Providers\Cache::class,
        Providers\HttpClient::class,
        MigrationsServicesProvider::class,

        // Application services
        ExampleProvider::class,
    ];

    /**
     * The global middlewares, attached to the application.
     */
    protected array $middlewares = [];
}
