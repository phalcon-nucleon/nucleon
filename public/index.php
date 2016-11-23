<?php

try {
    /*--------------------------------------------------------------*/
    /* Make Application                                             */
    /*--------------------------------------------------------------*/

    /** @var \Neutrino\Foundation\Bootstrap $bootstrap */
    $bootstrap = require_once __DIR__ . '/../bootstrap/app.php';

    /** @var \App\Http\Kernel $kernel */
    $kernel = $bootstrap->make(App\Http\Kernel::class);

    /**
     * Handle the request
     */
    $response = $kernel->handle();

    /**
     * Send the response.
     */
    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
