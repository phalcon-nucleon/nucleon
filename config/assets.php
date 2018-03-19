<?php

return [
    'sass' => [
        /*
         +---------------------------------------------------------------
         | Sass files
         +---------------------------------------------------------------
         | {src file} => {dest file}
         |
         */
        'files' => [
            'resources/assets/sass/app/app.scss' => 'public/css/app.css',
            'resources/assets/sass/frontend/frontend.scss' => 'public/css/frontend.css',
            'resources/assets/sass/backend/backend.scss' => 'public/css/backend.css',
        ],
        /*
         +---------------------------------------------------------------
         | Sass Options
         +---------------------------------------------------------------
         |
         */
        'options' => [
            /*
             +---------------------------------------------------------------
             | Output style
             +---------------------------------------------------------------
             | compressed, compact, nested, expanded
             */
            'style' => 'compressed',
            /*
             +---------------------------------------------------------------
             | Sourcemap
             +---------------------------------------------------------------
             | none, inline
             */
            'sourcemap' => 'none'
        ]
    ],
    'js' => [
        /*
         +---------------------------------------------------------------
         | Compilation - Closure Compiler Options
         +---------------------------------------------------------------
         | https://developers.google.com/closure/compiler/docs/api-ref
         |
         */
        'compile' => [
            /*
             +---------------------------------------------------------------
             | Directories to compile
             +---------------------------------------------------------------
             |
             */
            'directories' => [
                'resources/assets/js'
            ],
            /*
             +---------------------------------------------------------------
             | Compilation level
             +---------------------------------------------------------------
             | WHITESPACE_ONLY
             | SIMPLE_OPTIMIZATIONS
             | ADVANCED_OPTIMIZATIONS
             */
            'level' => 'ADVANCED_OPTIMIZATIONS',
            /*
             +---------------------------------------------------------------
             | Externs libraries.
             +---------------------------------------------------------------
             | Note : not added to output file.
             */
            'externs_url' => [
                'http://code.jquery.com/jquery-3.3.1.js',
                'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js',
            ]
        ],
        /*
         +---------------------------------------------------------------
         | Pre-Compilation - Speedhack
         +---------------------------------------------------------------
         | Apply before call closure compiler
         |
         */
        'precompilations' => [
            /*
             +---------------------------------------------------------------
             | jQuery id selector speedhack
             +---------------------------------------------------------------
             | Increase performance of jQuery id selector
             | Add function :
             |    function jQuerySelectorSpeedhack(id){return $(document.getElementById(id))}
             |
             | Replace :
             |  $('#someid')        > jQuerySelectorSpeedhack('someid')
             |  $('#someid .test')  > jQuerySelectorSpeedhack('someid').find('.test')
             |
             */
            \Neutrino\Assets\Closure\JqueryIdPrecompilation::class,
            /*
             +---------------------------------------------------------------
             | Enable or disable debug function.
             +---------------------------------------------------------------
             | Add function (in debug) :
             |    function debug(){console.log.apply(console, arguments)}
             |
             | Closure compiler (with ADVANCED_OPTIMIZATIONS) will remove all
             | debug call, when debug is disable.
             |
             */
            \Neutrino\Assets\Closure\DebugPrecompilation::class => [
                'debug' => APP_DEBUG
            ],
            /*
             +---------------------------------------------------------------
             | Wrap all file in a global closure
             +---------------------------------------------------------------
             | Closure compiler (with ADVANCED_OPTIMIZATIONS) will remove all
             | debug call, when debug is disable.
             |
             */
            \Neutrino\Assets\Closure\GlobalClosurePrecompilation::class => [
                'window' => 'window',
                'document' => 'document',
                'jQuery' => 'jQuery',
                'Materialize' => 'Materialize',
            ]
        ],
        /*
         +---------------------------------------------------------------
         | Output file
         +---------------------------------------------------------------
         |
         */
        'output_file' => 'public/js/app.js'
    ]
];
