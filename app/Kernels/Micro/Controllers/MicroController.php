<?php

namespace App\Kernels\Micro\Controllers;

//use Neutrino\Http\Controller;
use Phalcon\Mvc\Controller;

class MicroController extends Controller
{
  public function indexAction()
  {
    $this->response->setStatusCode(200);

    $this->response->setJsonContent(['action' => 'index']);

    return $this->response;
  }
}