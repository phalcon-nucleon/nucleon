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
        $this->response->setStatusCode(500, 'Internal Server Error');

        return $this->view->render('errors', 'http5xx');
    }

    public function http404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');

        return $this->view->render('errors', 'http404');
    }

    public function throwExceptionAction()
    {
        $this->flash->success('success');

        trigger_error('notice', E_USER_NOTICE);

        trigger_error('warning', E_USER_WARNING);

        try {
            throw new \Phalcon\Exception('A catched exception', 159);
        } catch (\Exception $e) {
            throw new \RuntimeException("that's a white rabbit", 0, $e);
        }
    }
}
