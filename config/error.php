<?php
/*
 +-------------------------------------------------------------------
 | Error configuration
 +-------------------------------------------------------------------
 |
 | Handling all error raised in application.
 | Auto dispatching on ErrorController
 */
return [
    'formatter'  => [
        'formatter'  => \Phalcon\Logger\Formatter\Line::class,
        'format'     => '[%date%][%type%] %message%',
        'dateFormat' => 'Y-m-d H:i:s O'
    ],
    'dispatcher' => [
        'namespace'  => 'App\Kernels\Http\Controllers',
        'controller' => 'errors',
        'action'     => 'index',
    ],
    'view'       => [
        'path' => 'errors',
        'file' => 'http5xx'
    ]
];