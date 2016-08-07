<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Registery Namespaces directory
 */
$loader->registerNamespaces([
    'Phalcon' => __DIR__ . '/../library/Phalcon',
    'Luxury'  => __DIR__ . '/../library/Luxury',
    'App'     => __DIR__ . '/../app',
])->register();

return $loader;
