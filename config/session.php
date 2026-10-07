<?php

/*
 +-------------------------------------------------------------------
 | Session configuration
 +-------------------------------------------------------------------
 |
 | The `session` service (Phalcon\Session\Manager) on the adapter of the default store, started on first use.
 |  - adapter: stream, redis, libmemcached, noop, or a class implementing \SessionHandlerInterface
 |  - name: name of the session cookie
 */
return [
    'id'      => SESSION_ID,
    'default' => SESSION_STORE,
    'stores'  => [
        'files' => [
            'adapter' => 'stream',
            'name'    => 'NUCLEONSESSID',
            'options' => ['savePath' => BASE_PATH . '/storage/sessions', 'uniqueId' => SESSION_ID],
        ],

        /*
        'redis' => [
            'adapter' => 'redis',
            'name'    => 'NUCLEONSESSID',
            'options' => ['host' => REDIS_HOST, 'port' => REDIS_PORT, 'auth' => REDIS_PASSWORD, 'index' => 1, 'lifetime' => 3600, 'prefix' => 'app_session_'],
        ],
        */
    ],
];
