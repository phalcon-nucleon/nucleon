<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Core\Constants\Services;
use App\Core\Facades\SomeApi;

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
