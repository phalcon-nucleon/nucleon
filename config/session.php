<?php

/*
 +-------------------------------------------------------------------
 | Session configuration
 +-------------------------------------------------------------------
 */
return [
    'id' => SESSION_ID,

    'default' => SESSION_DRIVER,

    'stores' => [
        /*
         +---------------------------------------------------------------
         | Session Adapter
         +---------------------------------------------------------------
         |
         | This value define the session adapter
         |
         | Available Session Adapter :
         | \Phalcon\Session\Adapter\Files
         | \Phalcon\Session\Adapter\Libmemcached
         | \Phalcon\Session\Adapter\Memcache
         | \Phalcon\Session\Adapter\Redis
         |
         | (phalcon/incubator)
         | \Phalcon\Session\Adapter\Aerospike
         | \Phalcon\Session\Adapter\Database
         | \Phalcon\Session\Adapter\HandlerSocket
         | \Phalcon\Session\Adapter\Mongo
         */

        /*
         +---------------------------------------------------------------
         | Files Adapter
         +---------------------------------------------------------------
         */
        'files' => [
            'adapter' => \Phalcon\Session\Adapter\Files::class,
            'options' => [
                'uniqueId' => SESSION_ID
            ]
        ],
        /**/

        /*
         +---------------------------------------------------------------
         | Memcached Adapter - Example
         +---------------------------------------------------------------
         *
        'memcached' => [
            'adapter' => \Phalcon\Session\Adapter\Libmemcached::class,
            'options' => [
                'servers' => [
                    [
                        'host' => '127.0.0.1',
                        'port' => 11211,
                        'weight' => 0,
                    ]
                ],
                'client' => [
                    \Memcached::OPT_HASH => \Memcached::HASH_MD5,
                ],
                'lifetime' => 3600,
                'prefix'  => 'app_session_',
            ]
        ],
        /**/

        /*
         +---------------------------------------------------------------
         | Redis Adapter - Example
         +---------------------------------------------------------------
         *
        'redis' => [
            'adapter' => \Phalcon\Session\Adapter\Redis::class,
            'options' => [
                'uniqueId'   => SESSION_ID,
                'host'       => 'localhost',
                'port'       => 6379,
                'auth'       => 'redis_auth',
                'persistent' => false,
                'lifetime'   => 3600,
                'prefix'     => 'app_session_',
                'index'      => 1,
            ]
        ],
        /**/
    ]
];