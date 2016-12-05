<?php

define('APP_ENV', 'development');

/**
 * Register The Auto Loader
 */
require __DIR__ . '/autoload.php';

/**
 * Run \Neutrino\Dotenv
 */
\Neutrino\Dotenv\Loader::load(__DIR__.'/../');

/**
 * Read the configuration
 */
$config = \Neutrino\Config\Loader::load(__DIR__.'/../', ['compile']);

/**
 * Creating the application
 */
return new \Neutrino\Foundation\Bootstrap($config);
