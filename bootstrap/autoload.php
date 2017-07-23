<?php
/*
 * Include compiled file, before the autoloader, implies that all classes inherited or implemented must be compiled in this file
 */
if (file_exists(__DIR__ . '/compile/compile.php')) {
    require __DIR__ . '/compile/compile.php';
}

if (file_exists(__DIR__ . '/compile/loader.php')) {
    /**
     * Phalcon auto-loader.
     */
    require __DIR__ . '/compile/loader.php';
} else {
    /**
     * Composer auto-loader.
     */
    require __DIR__ . '/../vendor/autoload.php';
}
