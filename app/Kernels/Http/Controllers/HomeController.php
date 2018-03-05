<?php

namespace App\Kernels\Http\Controllers;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class HomeController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->render('home', 'index');
    }
}
