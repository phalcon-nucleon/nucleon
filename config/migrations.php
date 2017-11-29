<?php

use Neutrino\Database\Migrations;

return [
  'storage' => Migrations\Storage\DatabaseStorage::class,
  'prefix' => Migrations\Prefix\DatePrefix::class,
  'path' => BASE_PATH . '/migrations',
];