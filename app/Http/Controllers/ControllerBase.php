<?php

namespace App\Http\Controllers;

use Luxury\Foundation\Controller;
use Phalcon\Mvc\View;

/**
 * Class ControllerBase
 *
 * @package Controllers
 */
class ControllerBase extends Controller
{
    /**
     * Controller initialization.
     *
     * Called just before the action method.
     */
    public function initialize()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
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
