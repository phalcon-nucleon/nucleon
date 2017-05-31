<?php

namespace App\Core\Facades;

use App\Core\Constants\Services;
use Neutrino\Support\Facades\Facade;

/**
 * Class SomeApi
 *
 * @package App\Core\Facades
 *
 * @method static string doSomething()
 * @method static string doAnotherThing()
 */
class Example extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Services::EXAMPLE;
    }
}
