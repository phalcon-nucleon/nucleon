<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Kernels\Http\Controllers\ControllerJson;
use Neutrino\Http\Middleware\ThrottleRequest;

/**
 * Class ThrottledController
 *
 * @package     App\Kernels\Http\Modules\Frontend\Controllers
 */
class ThrottledController extends ControllerJson
{
    protected function onConstruct()
    {
        parent::onConstruct();

        $this->middleware(ThrottleRequest::class, [60, 60]);
    }

    public function indexAction()
    {
    }
}
