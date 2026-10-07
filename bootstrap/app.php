<?php

declare(strict_types=1);

/*
 * Register the auto-loader.
 */
require __DIR__ . '/autoload.php';

/*
 * Constants of .const.ini (compiled by `php quark dotconst:cache`).
 */
\Neutrino\Dotconst::load(__DIR__ . '/../', __DIR__ . '/../bootstrap/compile');

/*
 * Configuration of config/*.php (compiled by `php quark config:cache`).
 */
$config = \Neutrino\Config\Loader::load(__DIR__ . '/..');

/*
 * Creating the application. Bootstrap::make() registers the error handler (config/error.php: `register`).
 */
return new \Neutrino\Foundation\Bootstrap($config);
