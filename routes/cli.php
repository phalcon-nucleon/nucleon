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
    'task' => \App\Kernels\Cli\Tasks\SomeTask::class
]);
Router::add('some:test (\w+)(?: (\w+))', [
  'task'    => \App\Kernels\Cli\Tasks\SomeTask::class,
  'action'  => 'test',
  'param_1' => 1,
  'param_2' => 2
]);