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

        $exceptions = [];

        if ($isException = $error->isException) {
            $exception = $error->exception;

            do {
                $exceptions[] = [
                  'class' => get_class($exception),
                  'code' => $exception->getCode(),
                  'message' => $exception->getMessage(),
                  'file' => $exception->getFile(),
                  'line' => $exception->getLine(),
                  'traces' => Helper::formatExceptionTrace($exception),
                ];
            } while ($exception = $exception->getPrevious());
        }

        $this->view->setVars([
          'error' => $error,
          'isException' => $isException,
          'exceptions' => $exceptions,
        ]);

        return $this->view->render('errors', 'debug');
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

        try {
            throw new \Exception('A catched exception');
        } catch (\Exception $e) {
            throw new \Phalcon\Exception('An uncaught exception', $e->getCode(), $e);
        }
    }
}
