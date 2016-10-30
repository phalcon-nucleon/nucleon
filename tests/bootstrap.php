<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

define('APP_PATH', realpath(__DIR__ . '/../'));

define('APP_ENV', 'testing');

set_include_path(
   __DIR__ . PATH_SEPARATOR . get_include_path()
);

/**
 * Read the configuration
 */
$config = require __DIR__ . "/../config/config.php";

/**
 * Register composer auto-loader
 */
require __DIR__ . '/../vendor/autoload.php';
