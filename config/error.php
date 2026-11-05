<?php

/*
 +-------------------------------------------------------------------
 | Error configuration
 +-------------------------------------------------------------------
 |
 | Neutrino\Foundation\Bootstrap registers the error handler (`register` => false to register it yourself).
 | The HTTP kernel answers the fatal errors with the error controller, or else the error view.
 | In debug mode, the debug error page (and phalcon/debugbar when installed, see `debug.bar` in config/debug.php).
 */
return [
    'register'   => true,
    'formatter'  => ['formatter' => 'line', 'format' => '[%date%][%level%] %message%', 'date_format' => 'Y-m-d H:i:s O'],
    'dispatcher' => [
        'namespace'  => 'App\Kernels\Http\Controllers',
        'controller' => 'errors',
        'action'     => 'index',
    ],
    'view'       => [
        'path' => 'errors',
        'file' => 'http5xx',
    ],
];
