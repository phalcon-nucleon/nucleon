<?php

namespace App\Http\Controllers;

use Luxury\Http\Middleware\Throttle as ThrottleMiddleware;

/**
 * Class ThrottledController
 *
 * @package     App\Http\Controllers
 */
class ThrottledController extends ControllerJson
{
    protected function onConstruct()
    {
        parent::onConstruct();

        $this->middleware(new ThrottleMiddleware(60, 60));
    }

    public function indexAction()
    {
    }
}
