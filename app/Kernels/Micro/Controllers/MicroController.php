<?php

declare(strict_types=1);

namespace App\Kernels\Micro\Controllers;

use Phalcon\Mvc\Controller;

class MicroController extends Controller
{
    public function indexAction()
    {
        return $this->response->setStatusCode(200)->setJsonContent(['action' => 'index']);
    }
}
