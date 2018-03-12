<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

/**
 * Read the configuration
 */
\Neutrino\Dotconst::load(__DIR__.'/../');

/**
 * Read the configuration
 */
$config = \Neutrino\Config\Loader::load(__DIR__.'/../', ['compile']);

/**
 * Register composer auto-loader
 */
require __DIR__ . '/../vendor/autoload.php';
