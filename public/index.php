<?php

declare(strict_types=1);

/*--------------------------------------------------------------*/
/* Make Application                                             */
/*--------------------------------------------------------------*/

/** @var \Neutrino\Foundation\Bootstrap $bootstrap */
$bootstrap = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Run the HTTP kernel: it handles the current request.
 */
$bootstrap->run($bootstrap->make(App\Kernels\Http\Kernel::class));
