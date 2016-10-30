<?php

try {
    /*--------------------------------------------------------------*/
    /* Make Application                                             */
    /*--------------------------------------------------------------*/

    /** @var \Luxury\Foundation\Application $application */
    $application = require_once __DIR__ . '/../bootstrap/app.php';

    /** @var \App\Http\Kernel $kernel */
    $kernel = $application->make(App\Http\Kernel::class);
    /**
     * Handle the request
     */
    $response = $kernel->handle();

    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
