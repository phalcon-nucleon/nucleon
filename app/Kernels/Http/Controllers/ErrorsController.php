<?php

namespace App\Kernels\Http\Controllers;

use Phalcon\Mvc\View;

/**
 * Class ErrorsController
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class ErrorsController extends ControllerBase
{
    public function initialize()
    {
        $this->assets->addCss('css/bootstrap.min.css');
    }

    public function indexAction()
    {
        /* @var \Neutrino\Error\Error $error */
        $error = $this->dispatcher->getParam('error');

        $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        $this->view->error = $error;

        $this->view->setTemplateAfter('main');
        $this->view->render('errors', 'index');
    }

    public function http404Action()
    {
        $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        $this->view->setTemplateAfter('main');
        $this->view->render('errors', 'http404');
    }

    public function throwExceptionAction()
    {
        throw new \Exception('An uncaught exception');
    }
}
