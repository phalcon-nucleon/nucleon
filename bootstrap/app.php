<?php

/**
 * Register The Auto Loader
 */
require __DIR__ . '/autoload.php';

/**
 * Global Error & Exception Handler
 */
Neutrino\Debug\Exceptions\Handler::register(App\Exceptions\ExceptionHandler::class);

/**
 * Run \Neutrino\Dotconst
 */
Neutrino\Dotconst::load(__DIR__ . '/../', __DIR__ . '/../bootstrap/compile');

/**
 * Read the configuration
 */
$config = Neutrino\Config\Loader::load(__DIR__ . '/../', ['compile']);

/**
 * Creating the application
 */
return new Neutrino\Foundation\Bootstrap($config);
