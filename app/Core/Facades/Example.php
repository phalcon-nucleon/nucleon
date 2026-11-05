<?php

declare(strict_types=1);

namespace App\Core\Facades;

use App\Core\Constants\Services;
use Neutrino\Support\Facades\Facade;

/**
 * @method static string doSomething()
 * @method static string doAnotherThing()
 */
class Example extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Services::EXAMPLE;
    }
}
