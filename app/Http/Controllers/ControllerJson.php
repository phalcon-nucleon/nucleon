<?php

namespace App\Http\Controllers;

use Luxury\Http\Controller;
use Phalcon\Mvc\View;

/**
 * Class ControllerJson
 *
 * @package App\Http\Controllers
 */
class ControllerJson extends Controller
{
    public function initialize()
    {
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    /**
     * Event called on controller construction
     *
     * Register middleware here.
     */
    protected function onConstruct()
    {
        ;
    }
}
