<?php

/*
 +-------------------------------------------------------------------
 | Authentication configuration
 +-------------------------------------------------------------------
 |
 | The `auth` service is a Phalcon\Auth\Manager. Here, one session guard on the User model.
 */
return [
    'guards' => [
        'web' => [
            'type'    => 'session',
            'default' => true,
            'adapter' => ['name' => 'model', 'options' => ['model' => \App\Core\Models\User::class]],
            'options' => ['name' => 'auth', 'rememberName' => 'remember_me', 'rememberTtl' => 1209600],
        ],
    ],
];
