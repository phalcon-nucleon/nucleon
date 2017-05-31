<?php
/*
 +-------------------------------------------------------------------
 | View configuration
 +-------------------------------------------------------------------
 */
return [
    /*
     +---------------------------------------------------------------
     | views_dir
     +---------------------------------------------------------------
     |
     | This value define where the view are stored
     */
    'views_dir'     => __DIR__ . '/../resources/views/',
    /*
     +---------------------------------------------------------------
     | compiled_path
     +---------------------------------------------------------------
     |
     | This value define the store of compiled view
     */
    'compiled_path' => __DIR__ . '/../storage/views/',
    /*
     +---------------------------------------------------------------
     | implicit
     +---------------------------------------------------------------
     |
     | This value define if your application
     | should use implicit view.
     | Default : false, no implicit view
     */
    'implicit'      => false,
];