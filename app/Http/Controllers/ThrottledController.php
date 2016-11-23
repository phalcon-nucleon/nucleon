<?php

namespace App\Http\Controllers;

use Neutrino\Http\Middleware\ThrottleRequest;

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

        $this->middleware(new ThrottleRequest(60, 60));
    }

    public function indexAction()
    {
    }
}
