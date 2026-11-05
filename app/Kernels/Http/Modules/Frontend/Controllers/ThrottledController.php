<?php

declare(strict_types=1);

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Kernels\Http\Controllers\ControllerJson;
use Neutrino\Http\Middleware\ThrottleRequest;

class ThrottledController extends ControllerJson
{
    protected function onConstruct()
    {
        parent::onConstruct();

        // 60 requests per 60 seconds.
        $this->middleware(ThrottleRequest::class, 60, 60);
    }

    public function indexAction() {}
}
