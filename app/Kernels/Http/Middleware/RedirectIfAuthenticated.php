<?php

declare(strict_types=1);

namespace App\Kernels\Http\Middleware;

use Neutrino\Constants\Services;
use Neutrino\Foundation\Middleware\Controller as ControllerMiddleware;
use Neutrino\Interfaces\Middleware\BeforeInterface;
use Phalcon\Events\Event;

/**
 * Redirects the authenticated users to the home page (login and register pages).
 */
class RedirectIfAuthenticated extends ControllerMiddleware implements BeforeInterface
{
    public function before(Event $event, object $source, mixed $data = null)
    {
        if ($this->getDI()->getShared(Services::AUTH)->check()) {
            $this->response->redirect('');

            return false;
        }

        return true;
    }
}
