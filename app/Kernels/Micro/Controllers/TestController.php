<?php

namespace App\Kernels\Micro\Controllers;

use Neutrino\Http\Controller;

class TestController extends Controller
{
  public function indexAction()
  {
    $this->response->setStatusCode(200);

    $this->response->setJsonContent(['action' => 'index']);

    return $this->response;
  }
}