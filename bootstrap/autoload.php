<?php

if (file_exists(__DIR__ . '/compile/loader.php')) {
  require __DIR__ . '/compile/loader.php';

  return;
}

if (file_exists(__DIR__ . '/compile/compile.php')) {
  require __DIR__ . '/compile/compile.php';

  return;
}

/**
 * Composer auto-loader.
 */
require __DIR__ . '/../vendor/autoload.php';
