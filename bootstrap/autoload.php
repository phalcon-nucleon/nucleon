<?php

error_reporting(E_ALL);

define('APP_PATH', realpath(__DIR__ . '/../'));

define('APP_ENV', 'development');

/**
 * Read the configuration
 */
$config = require __DIR__ . "/../config/config.php";

/**
 * Read auto-loader
 */
$loader = require __DIR__ . "/../config/loader.php";
