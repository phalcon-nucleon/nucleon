<?php
/*
|--------------------------------------------------------------------------
| Http Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the HttpKernel
|
*/
$di = \Phalcon\Di::getDefault();
/** @var \Phalcon\Mvc\Dispatcher $dispatcher */
//$dispatcher = $di->getShared(\Neutrino\Constants\Services::DISPATCHER);
//$dispatcher->setControllerSuffix('');

/** @var \Phalcon\Mvc\Router $router */
$router = $di->getShared(\Neutrino\Constants\Services::ROUTER);

//$router->setDefaultModule('Frontend');
//$router->setDefaultNamespace('App\Kernels\Http\Modules\Frontend\Controllers');

$router->notFound([
    'controller' => 'errors',
    'action'     => 'http404',
    'module'     => 'Frontend'
]);

$router->addGet('/', [
    'namespace' => 'App\Kernels\Http\Controllers',
    'controller' => 'home',
    'action'     => 'index'
]);

$router->addGet('/index', [
    'controller' => 'index',
    'action'     => 'index',
    'module'     => 'Frontend'
]);

$router->addGet('/register', [
    'controller' => 'auth',
    'action'     => 'register',
    'module'     => 'Frontend'
]);

$router->addPost('/register', [
    'controller' => 'auth',
    'action'     => 'postRegister',
    'module'     => 'Frontend'
]);

$router->addGet('/login', [
    'controller' => 'auth',
    'action'     => 'login',
    'module'     => 'Frontend'
]);

$router->addPost('/login', [
    'controller' => 'auth',
    'action'     => 'postLogin',
    'module'     => 'Frontend'
]);

$router->addGet('/logout', [
    'controller' => 'auth',
    'action'     => 'logout',
    'module'     => 'Frontend'
]);
