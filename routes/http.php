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

/*
|--------------------------------------------------------------------------
| Base Routes
|--------------------------------------------------------------------------
*/
$router->setDefaultNamespace('App\Kernels\Http\Controllers');

$router->notFound([
    'controller' => 'errors',
    'action'     => 'http404'
]);

$router->addGet('/', [
    'controller' => 'home',
    'action'     => 'index'
]);

$router->addGet('/exception-test', [
    'controller' => 'errors',
    'action'     => 'throwException'
]);

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
$frontend = new \Phalcon\Mvc\Router\Group([
    'namespace' => 'App\Kernels\Http\Modules\Frontend\Controllers',
    'module'     => 'Frontend'
]);
$frontend->addGet('/index', [
    'controller' => 'index',
    'action'     => 'index',
]);

/*
|--------------------------------------------------------------------------
| Front - Auth
|--------------------------------------------------------------------------
*/
$frontend->addGet('/register', [
    'controller' => 'auth',
    'action'     => 'register',
]);

$frontend->addPost('/register', [
    'controller' => 'auth',
    'action'     => 'postRegister',
]);

$frontend->addGet('/login', [
    'controller' => 'auth',
    'action'     => 'login',
]);

$frontend->addPost('/login', [
    'controller' => 'auth',
    'action'     => 'postLogin',
]);

$frontend->addGet('/logout', [
    'controller' => 'auth',
    'action'     => 'logout',
]);

$router->mount($frontend);

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
$backend = new \Phalcon\Mvc\Router\Group([
    'namespace' => 'App\Kernels\Http\Modules\Backend\Controllers',
    'module'     => 'Backend'
]);

$backend->addGet('/back/:controller/:action');

$router->mount($backend);