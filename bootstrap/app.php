<?php

/**
 * Register The Auto Loader
 */
require __DIR__ . '/autoload.php';

/**
 * Run \Neutrino\Dotenv
 */
\Neutrino\Dotconst\Loader::load(__DIR__.'/../', __DIR__.'/../bootstrap/compile');

/**
 * Read the configuration
 */
$config = \Neutrino\Config\Loader::load(__DIR__.'/../', ['compile']);

/**
 * Creating the application
 */
return new \Neutrino\Foundation\Bootstrap($config);
