<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use Neutrino\Http\Controller;
use Phalcon\Mvc\View;

/**
 * Class ControllerBase
 *
 * @package     App\Kernels\Http\Modules\Frontend\Controllers
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
}
