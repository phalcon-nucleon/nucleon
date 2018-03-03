<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->assets->addCss("css/home.css");
        $this->view->render('front/index', 'index');
    }
}
