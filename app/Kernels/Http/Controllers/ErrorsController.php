<?php

namespace App\Kernels\Http\Controllers;

use Neutrino\Error\Handler;

/**
 * Class ErrorsController
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class ErrorsController extends ControllerBase
{
    public function indexAction()
    {
        /* @var \Neutrino\Error\Error $error */
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
