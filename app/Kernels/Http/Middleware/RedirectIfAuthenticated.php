<?php

namespace App\Kernels\Http\Middleware;

use Neutrino\Constants\Services;
use Neutrino\Foundation\Middleware\Controller as ControllerMiddleware;
use Neutrino\Interfaces\Middleware\BeforeInterface;
use Phalcon\Events\Event;

/**
 * Class Guest
 *
 * @package App\Kernels\Http\Modules\Frontend\Middleware
 */
class RedirectIfAuthenticated extends ControllerMiddleware implements BeforeInterface
{
    /**
     * Called before the execution of handler
     *
     * @param \Phalcon\Events\Event|mixed $event
     * @param \Phalcon\Dispatcher|mixed   $source
     * @param mixed|null                  $data
     *
     * @return bool
     */
    public function before(Event $event, $source, $data = null)
    {
        if ($this->{Services::AUTH}->check()) {
            $this->response->redirect('');

            return false;
        }

        return true;
    }
}
