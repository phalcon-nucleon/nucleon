<?php

namespace App\Kernels\Http\Modules\Frontend;

use App\Core\Providers\SomeApiServices as SomeApiProvider;
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
    protected $providers = [
        /*
         * SomeApi Service
         */
        SomeApiProvider::class
    ];
}
