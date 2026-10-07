<?php

/*
 +-------------------------------------------------------------------
 | Debug configuration
 +-------------------------------------------------------------------
 |
 | With APP_DEBUG, the HTTP kernel shows the debug error page, and the debug bar of phalcon/debugbar
 | (a development dependency) on the HTML pages. `bar`: the options of Phalcon\DebugBar\Provider.
 */
return [
    'bar' => [
        'enabled' => true,
        // 'collectors' => ['config' => false, 'session' => false],
    ],
];
