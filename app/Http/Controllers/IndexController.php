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
        // Call SomeApi using DependencyInjection
        $this->getDI()->getShared(Services::SOME_API)->doSomething();

        // ShortCut Call
        $this->{Services::SOME_API}->doSomething();

        // Call SomeApi using Facade
        SomeApi::doAnotherThing();

        $this->view->content = "Some Content";

        $this->view->render('index', 'index');
    }
}
