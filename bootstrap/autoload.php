<?php

declare(strict_types=1);

/*
 * Composer auto-loader. In production, `php quark optimize` dumps an authoritative classmap and an OPcache
 * preload script (bootstrap/compile/preload.php, to declare in `opcache.preload`).
 */
require __DIR__ . '/../vendor/autoload.php';
