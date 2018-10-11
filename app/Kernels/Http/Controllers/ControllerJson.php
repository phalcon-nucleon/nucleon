<?php

namespace App\Kernels\Http\Controllers;

use Neutrino\Http\Controller;
use Phalcon\Mvc\View;

/**
 * Class ControllerJson
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class ControllerJson extends Controller
{
    public function initialize()
    {
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    /*
     * Event called on controller construction
     *
     * Register middleware here.
     *
    protected function onConstruct()
    {
        ;
    }
    /**/
}
