<?php

namespace App\Kernels\Http\Modules\Frontend\Middleware;

use Neutrino\Foundation\Middleware\Controller as ControllerMiddleware;
use Neutrino\Interfaces\Middleware\BeforeInterface;
use Neutrino\Support\Facades\Auth;
use Phalcon\Events\Event;

/**
 * Class Guest
 *
 * @package App\Kernels\Http\Modules\Frontend\Middleware
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
     * @throws \RuntimeException
     */
    public function before(Event $event, $source, $data = null)
    {
        if (Auth::check()) {
            throw new \RuntimeException('User already logged in.');
        }

        return true;
    }
}
