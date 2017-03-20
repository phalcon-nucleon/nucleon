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

use Neutrino\Support\Facades\Router;

Router::setDefaultNamespace('App\Kernels\Http\Modules\Frontend\Controllers');

Router::notFound([
    'controller' => 'errors',
    'action'     => 'http404'
]);

Router::addGet('/', [
    'controller' => 'index',
    'action'     => 'index'
]);

Router::addGet('/register', [
    'controller' => 'auth',
    'action'     => 'register'
]);

Router::addPost('/register', [
    'controller' => 'auth',
    'action'     => 'postRegister'
]);

Router::addGet('/login', [
    'controller' => 'auth',
    'action'     => 'login'
]);

Router::addPost('/login', [
    'controller' => 'auth',
    'action'     => 'postLogin'
]);

Router::addGet('/logout', [
    'controller' => 'auth',
    'action'     => 'logout'
]);
