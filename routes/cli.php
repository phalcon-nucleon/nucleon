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

use Neutrino\Support\Facades\Router;

Router::add('some', [
    'task' => \App\Kernels\Cli\Tasks\ExampleTask::class
]);
Router::add('show:up', [
    'task'    => \App\Kernels\Cli\Tasks\ExampleTask::class,
    'action'  => 'showup',
]);
Router::add('some:test {param_1} {param_2}', [
    'task'    => \App\Kernels\Cli\Tasks\ExampleTask::class,
    'action'  => 'test',
]);