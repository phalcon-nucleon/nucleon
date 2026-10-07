<?php

namespace App\Kernels\Http\Modules\Frontend;

use Neutrino\Module as NeutrinoModule;

/**
 * Class Kernel
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
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
