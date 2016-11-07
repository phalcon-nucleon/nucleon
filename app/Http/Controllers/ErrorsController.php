<?php

namespace App\Http\Controllers;

use Luxury\Error\Handler;

/**
 * Class ErrorsController
 *
 * @package App\Http\Controllers
 */
class ErrorsController extends ControllerBase
{

    protected function onConstruct()
    {
        parent::onConstruct();

        $this->app->useImplicitView(false);
    }

    public function indexAction()
    {
        /* @var \Luxury\Error\Error $error */
        $error = $this->dispatcher->getParam('error');

        $this->view->error = [
            'type'    => Handler::getErrorType($error->type),
            'message' => $error->message,
            'file'    => $error->file,
            'line'    => $error->line,
        ];

        $this->view->render('errors', 'index');
    }

    public function http404Action()
    {
        $this->view->render('errors', 'http404');
    }
}
