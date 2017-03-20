<?php

/*
|--------------------------------------------------------------------------
| Http Routes for Micro Kernel
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your micro application.
| These routes are loaded by the MicroKernel
|
| Micro route doesn't se suffix & default namespace, you must declare the handler controller by his full name :
| <code>
|   [
|     'controller' => \App\Kernels\Micro\Controllers\IndexController::class,
|   ]
| or
| <code>
|   use \App\Kernels\Micro\Controllers;
    // ..
|   [
|     'controller' => Controllers\IndexController::class,
|   ]
| <code>
// Via the Facade
use Neutrino\Support\Facades\Micro\Router;

Router::addGet('test', [
  'controller' => 'MyControllerClass',
  'action' => 'MyActionClass'
]);

*/
// Via the Dependency Injector
/** @var \Neutrino\Micro\Router $router */
$router = \Phalcon\Di::getDefault()->getShared(\Neutrino\Constants\Services::MICRO_ROUTER);

$router->addGet('/api/test',
  function () {
    /** @var \App\Kernels\Micro\Kernel $this */
    $this->response->setStatusCode(200);

    $this->response->setJsonContent(['status' => 'found', 'code' => 200]);

    return $this->response;
  });

$router->addGet('/api/index', ['controller' => \App\Kernels\Micro\Controllers\TestController::class, 'action' => 'indexAction']);

$router->notFound(function () {
  /** @var \App\Kernels\Micro\Kernel $this */
  $this->response->setStatusCode(404);

  $this->response->setJsonContent(['status' => 'not found', 'code' => 404]);

  return $this->response;
});