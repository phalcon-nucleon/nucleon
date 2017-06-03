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
    'namespace'  => 'App\Http\Controllers',
    'controller' => 'errors',
    'action'     => 'index',
];