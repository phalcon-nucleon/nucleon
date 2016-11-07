<?php

namespace App\Http\Middleware;

use Luxury\Foundation\Middleware\Controller as ControllerMiddleware;
use Luxury\Interfaces\Middleware\BeforeInterface;
use Luxury\Support\Facades\Auth;
use Phalcon\Events\Event;
use Phalcon\Http\Client\Exception;

/**
 * Class Guest
 *
 * @package App\Http\Middleware
 */
class Guest extends ControllerMiddleware implements BeforeInterface
{
    /**
     * Called before the execution of handler
     *
     * @param \Phalcon\Events\Event|mixed $event
     * @param \Phalcon\Dispatcher|mixed   $source
     * @param mixed|null                  $data
     *
     * @return bool
     * @throws Exception
     */
    public function before(Event $event, $source, $data = null)
    {
        if (Auth::check()) {
            throw new Exception('User already logged in.');
        }

        return true;
    }
}
