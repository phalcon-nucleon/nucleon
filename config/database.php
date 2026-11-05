<?php

/*
 +-------------------------------------------------------------------
 | Database configuration
 +-------------------------------------------------------------------
 |
 | `db` is the default connection, each connection is also `db.<name>` (built on first use).
 | A model uses another connection with `$this->setConnectionService('db.reports')`.
 |
 | Adapters: mysql, postgresql, sqlite, or a class implementing Phalcon\Db\Adapter\AdapterInterface.
 */
return [
    'default'     => 'mysql',
    'connections' => [
        'mysql' => [
            'adapter' => 'mysql',
            'config'  => [
                'host'     => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'dbname'   => DB_NAME,
                'charset'  => 'utf8mb4',
            ],
        ],
        // 'sqlite' => ['adapter' => 'sqlite', 'config' => ['dbname' => BASE_PATH . '/storage/database.sqlite']],
    ],
];
