<?php

/*
 +-------------------------------------------------------------------
 | Cache configuration
 +-------------------------------------------------------------------
 |
 | The `cache` service uses the default store; `Cache::uses('redis')` (or the `cache.redis` service) another one.
 | The stores implement Phalcon\Cache\CacheInterface (PSR-16: get, set, has, delete, clear…).
 |
 | A store: ['adapter' => …, 'serializer' => …, 'options' => […]]
 |  - adapter: apcu, libmemcached, memory, redis, rediscluster, stream, weak,
 |             or a class implementing Phalcon\Cache\Adapter\AdapterInterface
 |  - serializer: php (default), json, igbinary, msgpack, base64, none
 |  - options: of the Phalcon adapter (`storageDir` for stream, `host` and `port` for redis, `lifetime`…)
 */
return [
    'default' => CACHE_STORE,

    'stores' => [
        'file' => [
            'adapter' => 'stream',
            'options' => ['storageDir' => BASE_PATH . '/storage/caches/'],
        ],

        'memory' => ['adapter' => 'memory'],

        /*
        'memcached' => [
            'adapter' => 'libmemcached',
            'options' => ['servers' => [['host' => '127.0.0.1', 'port' => 11211, 'weight' => 1]]],
        ],

        'redis' => [
            'adapter' => 'redis',
            'options' => ['host' => REDIS_HOST, 'port' => REDIS_PORT, 'auth' => REDIS_PASSWORD, 'index' => 0],
        ],
        */
    ],
];
