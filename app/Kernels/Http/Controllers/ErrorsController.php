<?php

namespace App\Kernels\Http\Controllers;

use Neutrino\Error\Helper;

/**
 * Class ErrorsController
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class ErrorsController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->setStatusCode(500);

        if (!APP_DEBUG) {
            return $this->view->render('errors', 'http5xx');
        }

        /* @var \Neutrino\Error\Error $error */
        $error = $this->dispatcher->getParam('error');

        return $this->view->render('errors', 'debug', [
          'error' => $error,
          'isException' => $error->isException,
          'traces' => $error->isException ? Helper::formatExceptionTrace($error->exception) : [],
        ]);
    }

    public function http404Action()
    {
        $this->response->setStatusCode(404);

        return $this->view->render('errors', 'http404');
    }

    public function throwExceptionAction()
    {
        $this->flash->success('success');

        trigger_error('notice', E_USER_NOTICE);

        trigger_error('warning', E_USER_WARNING);

        throw new \Exception('An uncaught exception');
    }
}
