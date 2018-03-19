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
        $this->view->render('front/index', 'index');
    }
}
