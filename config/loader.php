<?php

/**
 * Phalcon auto-loader.
 *
 * Registry the most important components
 *
use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces([
    'Phalcon' => __DIR__ . '/../vendor/phalcon/incubator/Library/Phalcon',
    'Luxury'  => __DIR__ . '/../../phalcon-luxury-framework/src/Luxury',
    'App'     => __DIR__ . '/../app',
])->register();

/**
 * Composer auto-loader.
 */
require __DIR__ . '/../vendor/autoload.php';

