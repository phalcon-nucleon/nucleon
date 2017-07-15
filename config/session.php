<?php

/*
 +-------------------------------------------------------------------
 | Session configuration
 +-------------------------------------------------------------------
 */
return [
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
    'id'      => SESSION_ID
];