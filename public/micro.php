<?php

declare(strict_types=1);

/*--------------------------------------------------------------*/
/* Make Application                                             */
/*--------------------------------------------------------------*/

/** @var \Neutrino\Foundation\Bootstrap $bootstrap */
$bootstrap = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Run the Micro kernel (the /api/ routes, see public/app_dev.php).
 */
$bootstrap->run($bootstrap->make(App\Kernels\Micro\Kernel::class));
