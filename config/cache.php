<?php

/*
 +-------------------------------------------------------------------
 | Cache configuration
 +-------------------------------------------------------------------
 |
 | Cache use the Strategy Design pattern.
 |
 | All caches defined below will be accessed via the function :
 | Neutrino\Support\Facade\Cache::uses({cache_name})
 */
return [
  /*
   +-----------------------------------------------------------
   | Cache Driver (backend)
   +-----------------------------------------------------------
   |
   | This value define the cache driver (backend)
   |
   | Available Cache Driver (Backend) :
   | \Phalcon\Cache\Backend\Apc
   | \Phalcon\Cache\Backend\Libmemcached
   | \Phalcon\Cache\Backend\File
   | \Phalcon\Cache\Backend\Memcache
   | \Phalcon\Cache\Backend\Memory
   | \Phalcon\Cache\Backend\Mongo
   | \Phalcon\Cache\Backend\Redis
   | \Phalcon\Cache\Backend\Xcache
   |
   | (phalcon/incubator)
   | \Phalcon\Cache\Backend\Aerospike
   | \Phalcon\Cache\Backend\Database
   | \Phalcon\Cache\Backend\Wincache
   |
   +-----------------------------------------------------------
   | Cache Adapter (frontend)
   +-----------------------------------------------------------
   |
   | This value define the cache adapter (frontend)
   |
   | Available Cache Adapter (Frontend) :
   | \Phalcon\Cache\Frontend\Data
   | \Phalcon\Cache\Frontend\Json
   | \Phalcon\Cache\Frontend\File
   | \Phalcon\Cache\Frontend\Base64
   | \Phalcon\Cache\Frontend\Output
   | \Phalcon\Cache\Frontend\Igbinary
   | \Phalcon\Cache\Frontend\None
   |
   */
  'default' => CACHE_DRIVER,
  'stores' => [
    'file' => [
      'driver' => 'File',
      'adapter' => 'Data',
      'options' => ['cacheDir' => BASE_PATH . '/storage/caches/'],
    ],

    /*
     +---------------------------------------------------------------
     | Libmemcached Adapter - Example
     +---------------------------------------------------------------
     *
    'memcache' => [
      'driver' => 'Libmemcached',
      'adapter' => 'None',
      'options' => [
        'servers' => [
          [
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 0,
          ],
        ],
      ],
    ],
    /**/

    /*
     +---------------------------------------------------------------
     | Redis Adapter - Example
     +---------------------------------------------------------------
     *
    'redis' => [
      'driver' => 'Redis',
      'adapter' => 'Data',
      'options' => [
        'host' => REDIS_HOST,
        'user' => REDIS_USER,
        'port' => REDIS_PORT,
        "auth" => REDIS_PASSWORD,
        "index" => 0,
      ],
    ],
    /**/
  ],
];
