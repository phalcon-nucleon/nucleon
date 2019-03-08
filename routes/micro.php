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

/*
|--------------------------------------------------------------------------
| Api - Routes
|--------------------------------------------------------------------------
*/
$router->addGet('/api/index', [
  'controller' => \App\Kernels\Micro\Controllers\MicroController::class,
  'action' => 'indexAction'
]);

$router->addGet('/api/test', function () {
    /** @var \App\Kernels\Micro\Kernel $this */
    return $this->response
      ->setStatusCode(200, 'OK')
      ->setJsonContent([
        'status' => 'found',
        'code' => 200
      ]);
});

/*
|--------------------------------------------------------------------------
| Api - NotFound
|--------------------------------------------------------------------------
*/
$router->notFound(function () {
    /** @var \App\Kernels\Micro\Kernel $this */
    return $this->response
      ->setStatusCode(404, 'Not Found')
      ->setJsonContent([
        'status' => 'not found',
        'code' => 404
      ]);
});

/*
|--------------------------------------------------------------------------
| Api - Error
|--------------------------------------------------------------------------
*/
/** @var \Phalcon\Mvc\Micro $app */
$app = \Phalcon\Di::getDefault()->getShared(\Neutrino\Constants\Services::APP);

$app->error(function ($exception) {
    /** @var \App\Kernels\Micro\Kernel $this */
    if ($exception instanceof \Neutrino\Exceptions\TokenMismatchException) {
        return $this->response
          ->setStatusCode(401, 'Unauthorized')
          ->setJsonContent([
            'status' => 'Unauthorized',
            'code' => 401,
            'error' => 'Token mismatch',
          ]);
    }

    if (APP_DEBUG) {
        throw $exception;
    }

    return $this->response
      ->setStatusCode(500, 'Internal Server Error')
      ->setJsonContent([
        'status' => 'Internal Server Error',
        'code' => 500,
      ]);
});
