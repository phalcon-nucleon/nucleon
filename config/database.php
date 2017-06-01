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
    'adapter'  => \Phalcon\Db\Adapter\Pdo\Mysql::class,
    'host'     => 'localhost',
    'username' => \Neutrino\Dotenv::env('DB_USER'),
    'password' => \Neutrino\Dotenv::env('DB_PASSWORD'),
    'dbname'   => 'nucleon-test',
    'charset'  => 'utf8',
];