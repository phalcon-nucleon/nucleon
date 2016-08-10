<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Phalcon auto-loader.
 *
 * Registry the most important components
 */
$loader->registerNamespaces([
    'Phalcon' => __DIR__ . '/../vendor/phalcon/incubator/Library/Phalcon',
    'Luxury'  => __DIR__ . '/../vendor/ark4ne/phalcon-luxury-framework/src/Luxury',
    'App'     => __DIR__ . '/../app',
])->register();

/**
 * Composer auto-loader.
 *
 * You can comment this if you load all your component with the Phalcon auto-loader.
 *
 * Logically, if you use Phalcon is that you are looking for performance.
 * Or Composeer is not written in C, so it is less efficient than the auto-loader Phalcon.
 */
require __DIR__ . '/../vendor/autoload.php';

return $loader;
