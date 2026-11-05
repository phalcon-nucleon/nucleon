<?php

/*
 +-------------------------------------------------------------------
 | Logger configuration
 +-------------------------------------------------------------------
 |
 | The `logger` service (Phalcon\Logger\Logger) writes to every adapter.
 |  - adapter: stream (`path`), syslog (`name`), noop, or a class implementing Phalcon\Logger\Adapter\AdapterInterface
 |  - formatter: line (default), json, a class, or ['formatter' => 'line', 'format' => '…', 'date_format' => '…']
 */
return [
    'level'     => APP_DEBUG ? 'debug' : 'info',
    'formatter' => ['formatter' => 'line', 'format' => '[%date%][%level%] %message%', 'date_format' => 'Y-m-d H:i:s O'],
    'adapters'  => [
        'main' => ['adapter' => 'stream', 'path' => BASE_PATH . '/storage/logs/nucleon.log'],
        // 'syslog' => ['adapter' => 'syslog', 'name' => 'nucleon', 'formatter' => 'json'],
    ],
];
