<?php

return [
    /* HTTP KERNEL */
    BASE_PATH . '/app/Kernels/Http/Kernel.php',
    BASE_PATH . '/app/Kernels/Http/Controllers/ControllerBase.php',
    BASE_PATH . '/app/Kernels/Http/Controllers/ControllerJson.php',

    /* MICRO KERNEL */
    BASE_PATH . '/app/Kernels/Micro/Kernel.php',
    BASE_PATH . '/app/Kernels/Micro/Controllers/MicroController.php',

    /* HTTP KERNEL - NO-MODULE */
    BASE_PATH . '/app/Kernels/Http/Controllers/HomeController.php',

    /* HTTP KERNEL - MODULE FRONTEND */
    BASE_PATH . '/app/Kernels/Http/Modules/Frontend/Module.php',
    BASE_PATH . '/app/Kernels/Http/Modules/Frontend/Controllers/ControllerBase.php',
    BASE_PATH . '/app/Kernels/Http/Modules/Frontend/Controllers/IndexController.php',
];