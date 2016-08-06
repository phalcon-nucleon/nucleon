<?php

return [
    'database'    => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'test',
        'charset'  => 'utf8',
    ],
    'application' => [
        'appDir'        => __DIR__ . '/../app/',
        'migrationsDir' => __DIR__ . '/../migrations/',
        'viewsDir'      => __DIR__ . '/../resources/views/',
        'cacheDir'      => __DIR__ . '/../storage/caches/',
        'logDir'        => __DIR__ . '/../storage/logs/',
        'vendorDir'     => __DIR__ . '/../vendor/',
        'baseUri'       => '/phalcon-lust/',
    ],
    'session'     => [
        'adapter' => 'Files' // Files, Memcache, Libmemcached, Redis
    ],
    'error'       => [
        'formatter'  => [
            'formatter'  => \Phalcon\Logger\Formatter\Line::class,
            'format'     => '[%date%][%type%] %message%',
            'dateFormat' => 'Y-m-d H:i:s O'
        ],
        'namespace'  => 'App\Http\Controllers',
        'controller' => 'errors',
        'action'     => 'index',
    ]
];
