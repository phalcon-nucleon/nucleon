<?php

namespace App\Kernels\Http\Controllers;

class HomeController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('home', 'index');
    }
}
