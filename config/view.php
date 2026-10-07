<?php

use Neutrino\View\Engines\Volt;

/*
 +-------------------------------------------------------------------
 | View configuration
 +-------------------------------------------------------------------
 */
return [
    // Where the views are stored, and the partials and layouts directories relative to it.
    'views_dir'     => BASE_PATH . '/resources/views/',
    'partials_dir'  => null,
    'layouts_dir'   => null,

    // Where the compiled views are stored (`php quark view:cache` compiles them all).
    'compiled_path' => BASE_PATH . '/storage/views/',

    // Volt options: path, separator, extension, always, stat. `stat` => false in production, after `view:cache`.
    'options'       => ['stat' => APP_DEBUG],

    // Implicit views (the action view is rendered without calling render()).
    'implicit'      => false,

    'engines' => [
        '.volt' => Volt\VoltEngineRegister::class,
    ],

    'extensions' => [
        // The PHP functions in Volt, except the dangerous ones (see `php_functions`).
        Volt\Compiler\Extensions\PhpFunctionExtension::class,
        // The Neutrino\Support\Str functions, and the slug, limit and words filters.
        Volt\Compiler\Extensions\StrExtension::class,
        // csrf_field(), csrf_key(), csrf_token().
        Volt\Compiler\Extensions\CsrfExtension::class,
    ],

    'filters' => [
        'round' => Volt\Compiler\Filters\RoundFilter::class,
        'merge' => Volt\Compiler\Filters\MergeFilter::class,
        'split' => Volt\Compiler\Filters\SplitFilter::class,
    ],

    'functions' => [
        'route' => Volt\Compiler\Functions\RouteFunction::class,
    ],

    // PhpFunctionExtension: functions allowed again (`allow`), or a list replacing the denied ones (`deny`).
    // 'php_functions' => ['allow' => [], 'deny' => [...]],
];
