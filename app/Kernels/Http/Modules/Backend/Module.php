<?php

namespace App\Kernels\Http\Modules\Backend;

use Neutrino\Module as NeutrinoModule;

class Module extends NeutrinoModule
{
    /**
     * Return the Provider List to load.
     *
     * @var string[]
     */
    protected array $providers = [];

    public function initialise(\Phalcon\Di\DiInterface $di): void
    {
    }
}
