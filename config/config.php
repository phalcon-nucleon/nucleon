<?php

return [
    /*
     +-------------------------------------------------------------------
     | Application configuration
     +-------------------------------------------------------------------
     */
    'app'      => [
        /*
         +---------------------------------------------------------------
         | Application base uri
         +---------------------------------------------------------------
         |
         | This value define the application base uri.
         | It is useful for router & url service.
         */
        'base_uri' => '/',
    ],
    /*
     +-------------------------------------------------------------------
     | Paths
     +-------------------------------------------------------------------
     */
    'paths'   => [
        /*
         +---------------------------------------------------------------
         | Application root path
         +---------------------------------------------------------------
         |
         | This value define the application base path.
         */
        'base'      => __DIR__ . '/../',
        /*
         +---------------------------------------------------------------
         | Application "App" path
         +---------------------------------------------------------------
         |
         | This value define the application "App" path.
         */
        'app'       => __DIR__ . '/../app/',
        /*
         +---------------------------------------------------------------
         | Application resource path
         +---------------------------------------------------------------
         |
         | This value define the resources path.
         */
        'resources' => __DIR__ . '/../resources/',
        /*
         +---------------------------------------------------------------
         | Application routes path
         +---------------------------------------------------------------
         |
         | This value define the routes path.
         */
        'routes'    => __DIR__ . '/../routes/',
        /*
         +---------------------------------------------------------------
         | Application storage path
         +---------------------------------------------------------------
         |
         | This value define the storage path.
         */
        'storage'   => __DIR__ . '/../storage/',
        /*
         +---------------------------------------------------------------
         | Application vendor path
         +---------------------------------------------------------------
         |
         | This value define the vendor path.
         */
        'vendor'    => __DIR__ . '/../vendor/',
    ],
    /*
     +-------------------------------------------------------------------
     | Auth configuration
     +-------------------------------------------------------------------
     */
    'auth'      => [
        /*
         +---------------------------------------------------------------
         | Auth model
         +---------------------------------------------------------------
         |
         | This value define the Model to use for authentication
         */
        'model' => \App\Models\User::class,
    ],
    /*
     +-------------------------------------------------------------------
     | Database configuration
     +-------------------------------------------------------------------
     */
    'database' => [
        /*
         +---------------------------------------------------------------
         | Database adapter
         +---------------------------------------------------------------
         |
         | This value define the adapter to use
         | for connect to the database.
         |
         | Available adapter :
         |
         | \Phalcon\Db\Adapter\Pdo\Mysql
         | \Phalcon\Db\Adapter\Pdo\Postgresql
         | \Phalcon\Db\Adapter\Pdo\Sqlite
         |
         | (phalcon/incubator)
         | \Phalcon\Db\Adapter\Pdo\Oracle
         | \Phalcon\Db\Adapter\Mongo\Db
         */
        'adapter'  => \Phalcon\Db\Adapter\Pdo\Mysql::class,
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'luxury-test',
        'charset'  => 'utf8',
    ],
    /*
     +-------------------------------------------------------------------
     | Cache configuration
     +-------------------------------------------------------------------
     |
     | Cache use the Strategy Design pattern.
     |
     | All caches defined below will be accessed via the function :
     | Luxury\Support\Facade\Cache::uses({cache_name})
     */
    'cache'    => [
        'default' => [
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
             */
            'driver'  => 'File',
            /*
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
             */
            'adapter' => 'Data',
            'options' => ['cacheDir' => __DIR__ . '/../storage/caches/'],
        ]
    ],
    /*
     +-------------------------------------------------------------------
     | Session configuration
     +-------------------------------------------------------------------
     */
    'session' => [
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
        'adapter' => 'Files',
        'id'      => 'phalcon-luxury'
    ],
    /*
     +-------------------------------------------------------------------
     | View configuration
     +-------------------------------------------------------------------
     */
    'view'    => [
        /*
         +---------------------------------------------------------------
         | views_dir
         +---------------------------------------------------------------
         |
         | This value define where the view are stored
         */
        'views_dir'     => __DIR__ . '/../resources/views/',
        /*
         +---------------------------------------------------------------
         | compiled_path
         +---------------------------------------------------------------
         |
         | This value define the store of compiled view
         */
        'compiled_path' => __DIR__ . '/../storage/views/',
        /*
         +---------------------------------------------------------------
         | implicit
         +---------------------------------------------------------------
         |
         | This value define if your application
         | should use implicit view.
         | Default : false, no implicit view
         */
        'implicit'      => false,
    ],
    /*
     +-------------------------------------------------------------------
     | Logger configuration
     +-------------------------------------------------------------------
     */
    'log'     => [
        /*
         +---------------------------------------------------------------
         | Logger Adapter
         +---------------------------------------------------------------
         |
         | This value define the logger adapter
         |
         | Available Logger Adapter :
         | \Phalcon\Logger\Adapter\File
         | \Phalcon\Logger\Adapter\Stream
         | \Phalcon\Logger\Adapter\Syslog
         |
         | (phalcon/incubator)
         | \Phalcon\Logger\Adapter\File\Multiple
         | \Phalcon\Logger\Adapter\Udplogger
         | \Phalcon\Logger\Adapter\Database
         | \Phalcon\Logger\Adapter\Firelogger
         */
        'adapter' => 'File',
        'path'    => __DIR__ . '/../storage/logs/luxury.log',
        'options' => []
    ],
    /*
     +-------------------------------------------------------------------
     | Error configuration
     +-------------------------------------------------------------------
     |
     | Handling all error raised in application.
     | Auto dispatching on ErrorController
     */
    'error'   => [
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
