<?php

namespace App\Api;

use Luxury\Constants\Services;
use Luxury\Support\Facades\Log;
use Phalcon\Di\Injectable;
use Phalcon\Di\InjectionAwareInterface;

/**
 * Class SomeApi
 *
 * @package App\Api
 */
class SomeApi extends Injectable implements InjectionAwareInterface
{
    /**
     * @return string
     */
    public function doSomething()
    {
        // Use DependencyInjection
        $logger = $this->getDI()->get(Services::LOGGER);

        $logger->debug('Something Appends !');

        return 'abc';
    }

    /**
     * @return string
     */
    public function doAnotherThing()
    {
        // Use Facade
        Log::debug('Another thing Appends !');

        return 'abc';
    }
}
