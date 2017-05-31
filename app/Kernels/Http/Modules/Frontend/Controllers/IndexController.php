<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Kernels\Http\Controllers\ControllerBase;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('index', 'index');
    }
}
