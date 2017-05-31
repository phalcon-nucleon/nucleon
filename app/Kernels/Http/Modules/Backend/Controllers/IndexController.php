<?php

namespace App\Kernels\Http\Modules\Backend\Controllers;

use App\Kernels\Http\Controllers\ControllerBase;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('index', 'index');
    }
}