<?php

/*
 +-------------------------------------------------------------------
 | Database configuration
 +-------------------------------------------------------------------
 */
return [
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
    'default'     => 'mysql',
    'connections' => [
        'mysql' => [
            'adapter' => \Phalcon\Db\Adapter\Pdo\Mysql::class,
            'config'  => [
                'host'     => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'dbname'   => DB_NAME,
                'charset'  => 'utf8',
            ]
        ]
    ],
];