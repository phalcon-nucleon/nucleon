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
     | partial_dir
     +---------------------------------------------------------------
     |
     | Relative path from view_dir to partials directory
     */
    'partials_dir' => 'partials/',
    /*
     +---------------------------------------------------------------
     | layout_dir
     +---------------------------------------------------------------
     |
     | Relative path from view_dir to layouts directory
     */
    'layouts_dir' => 'layouts/',
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