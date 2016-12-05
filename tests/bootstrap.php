<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

define('APP_ENV', 'testing');

set_include_path(
   __DIR__ . PATH_SEPARATOR . get_include_path()
);

/**
 * Read the configuration
 */
$config = \Neutrino\Config\Loader::load(__DIR__.'/../', ['compile']);

/**
 * Register composer auto-loader
 */
require __DIR__ . '/../vendor/autoload.php';
