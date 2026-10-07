<?php

declare(strict_types=1);

namespace App\Kernels\Http\Modules\Backend;

use Neutrino\Module as NeutrinoModule;
use Phalcon\Di\DiInterface;

class Module extends NeutrinoModule
{
    /**
     * The providers of the module.
     */
    protected array $providers = [];

    public function initialise(DiInterface $container): void {}
}
