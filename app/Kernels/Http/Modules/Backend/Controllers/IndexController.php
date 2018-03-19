<?php

namespace App\Kernels\Http\Modules\Backend\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('back/index', 'index');
    }
}
