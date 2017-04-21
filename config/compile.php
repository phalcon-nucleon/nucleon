<?php

return [
    /* MICRO KERNEL */
    __DIR__.'/../app/Kernels/Micro/Kernel.php',
    __DIR__.'/../app/Kernels/Micro/Controllers/MicroController.php',

    /* HTTP KERNEL */
    __DIR__.'/../app/Kernels/Http/Kernel.php',
    __DIR__.'/../app/Kernels/Http/Controllers/ControllerBase.php',
    __DIR__.'/../app/Kernels/Http/Controllers/ControllerJson.php',

    /* HTTP KERNEL - NO-MODULE */
    __DIR__.'/../app/Kernels/Http/Controllers/HomeController.php',

    /* HTTP KERNEL - MODULE FRONTEND */
    __DIR__.'/../app/Kernels/Http/Modules/Frontend/Module.php',
    __DIR__.'/../app/Kernels/Http/Modules/Frontend/Controllers/IndexController.php',
];