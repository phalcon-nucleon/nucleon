<?php

declare(strict_types=1);

namespace App\Core\Services;

use Neutrino\Constants\Services;
use Neutrino\Support\Facades\Log;
use Phalcon\Di\Injectable;

class Example extends Injectable
{
    public function doSomething(): string
    {
        // With the container.
        $this->getDI()->getShared(Services::LOGGER)->debug('Something happens!');

        return 'abc';
    }

    public function doAnotherThing(): string
    {
        // With a Facade.
        Log::debug('Another thing happens!');

        return 'abc';
    }
}
