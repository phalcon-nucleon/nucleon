<?php

declare(strict_types=1);

namespace App\Kernels\Http\Controllers;

use Neutrino\Http\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}
