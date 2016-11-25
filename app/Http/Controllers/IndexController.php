<?php

namespace App\Http\Controllers;

use App\Constants\Services;
use App\Facades\SomeApi;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class IndexController extends ControllerBase
{
    protected function onConstruct()
    {
        parent::onConstruct();

        $this->app->useImplicitView(false);
    }

    public function indexAction()
    {
        $this->view->render('index', 'index');
    }
}
