<?php

declare(strict_types=1);

namespace App\Kernels\Http\Controllers;

use RuntimeException;

class ErrorsController extends ControllerBase
{
    /**
     * The error page of the fatal errors (config/error.php), out of debug mode.
     */
    public function indexAction()
    {
        $this->response->setStatusCode(500, 'Internal Server Error');

        $this->view->render('errors', 'http5xx');
    }

    public function http404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');

        $this->view->render('errors', 'http404');
    }

    /**
     * Shows the error page: in debug mode, the debug error page lists the notice, the warning and the
     * exceptions.
     */
    public function throwExceptionAction()
    {
        $this->flash->success('success');

        trigger_error('notice', E_USER_NOTICE);
        trigger_error('warning', E_USER_WARNING);

        try {
            throw new \LogicException('A caught exception', 159);
        } catch (\LogicException $e) {
            throw new RuntimeException("that's a white rabbit", 0, $e);
        }
    }
}
