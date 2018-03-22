<?php
/*
 +-------------------------------------------------------------------
 | Logger configuration
 +-------------------------------------------------------------------
 */
return [
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
    'path'    => BASE_PATH . '/storage/logs/nucleon.log',
    'options' => []
];