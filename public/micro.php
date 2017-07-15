<?php

/*--------------------------------------------------------------*/
/* Make Application                                             */
/*--------------------------------------------------------------*/
/** @var \Neutrino\Foundation\Bootstrap $bootstrap */
$bootstrap = require_once __DIR__ . '/../bootstrap/app.php';

/** @var \App\Kernels\Micro\Kernel $kernel */
$kernel = $bootstrap->make(\App\Kernels\Micro\Kernel::class);

/**
 * Run kernel
 */
$bootstrap->run($kernel);