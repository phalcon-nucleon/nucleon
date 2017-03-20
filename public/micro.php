<?php
/*
$start = microtime(true);
echo '{"content":';
*/
try {
  /*--------------------------------------------------------------*/
  /* Make Application                                             */
  /*--------------------------------------------------------------*/

  /** @var \Neutrino\Foundation\Bootstrap $bootstrap */
  $bootstrap = require_once __DIR__ . '/../bootstrap/app.php';

  /** @var \App\Kernels\Micro\Kernel $kernel */
  $kernel = $bootstrap->make(\App\Kernels\Micro\Kernel::class);

  /**
   * Handle the request
   */
  $kernel->handle();
} catch (\Exception $e) {
  echo $e->getMessage() . '<br>';
  echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
/*
echo '' .
  ', "m":' . memory_get_usage() . PHP_EOL .
  ', "p":' . memory_get_peak_usage() . PHP_EOL .
  ', "r":' . (microtime(true) - $start) . PHP_EOL .
  ', "s":' . ($start) . PHP_EOL .
  ', "t":' . (microtime(true)) . PHP_EOL .
  '}';*/