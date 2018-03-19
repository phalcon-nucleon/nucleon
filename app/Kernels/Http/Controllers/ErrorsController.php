<?php

namespace App\Kernels\Http\Controllers;

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

        return $this->view->render('errors', 'http5xx');
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
