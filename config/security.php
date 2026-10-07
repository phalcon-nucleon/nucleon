<?php

/*
 +-------------------------------------------------------------------
 | Security configuration
 +-------------------------------------------------------------------
 */
return [
    'csrf' => [
        // A new CSRF token on each check (true), or one token for the session (false).
        'rotate' => false,
    ],
    'throttle' => [
        // Cache store of the rate limiter counters (the default store when null).
        'store' => null,
    ],
];
