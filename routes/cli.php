<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Here is where you can register console routes for your application.
| These routes are loaded by the CliKernel
|
*/

use App\Kernels\Cli\Tasks;
use Neutrino\Support\Facades\Router;

Router::addTask('some', Tasks\ExampleTask::class);

Router::addTask('show:up', Tasks\ExampleTask::class, 'showup');

Router::addTask('some:test {param_1} {param_2}', Tasks\ExampleTask::class, 'test');
