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

use Luxury\Support\Facades\Router;

Router::setDefaultNamespace('App\Http\Controllers');

Router::notFound([
    'controller' => 'errors',
    'action'     => 'http404'
]);

Router::addGet('/', [
    'controller' => 'index',
    'action'     => 'index'
]);

Router::addGet('/signin', [
    'controller' => 'auth',
    'action'     => 'signin'
]);

Router::addPost('/login', [
    'controller' => 'auth',
    'action'     => 'login'
]);