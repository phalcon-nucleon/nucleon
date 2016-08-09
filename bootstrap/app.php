<?php

/**
 * Register The Auto Loader
 */
require __DIR__ . '/autoload.php';

/**
 * Read the configuration
 */
$config = new \Phalcon\Config\Adapter\Php(__DIR__ . "/../config/config.php");

/**
 * Creating the application
 */
return new \Luxury\Foundation\Application($config);
