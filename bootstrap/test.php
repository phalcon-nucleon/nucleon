<?php

error_reporting(E_ALL);

define('APP_PATH', realpath(__DIR__ . '/../'));

define('APP_ENV', 'testing');

/**
 * Read the configuration
 */
$config = require __DIR__ . "/../config/config.php";

/**
 * Register auto-loader
 */
$loader = require __DIR__ . "/../config/loader.php";


/**
 * Register composer auto-loader
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Register composer auto-loader
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Creating the application
 */
$app = new \Luxury\Foundation\Application();

$app->make(\App\Http\Kernel::class);

return $app;
