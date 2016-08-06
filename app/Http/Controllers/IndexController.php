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
    }

    public function forwardAction()
    {
        $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index'
        ]);
    }
}
