<?php

declare(strict_types=1);

namespace App\Kernels\Http\Controllers;

class HomeController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('home', 'index');
    }
}
