<?php

namespace Test;

use Luxury\Support\Facades\Auth;
use Luxury\Test\RoutesTestCase;

/**
 * Class RoutesTest
 */
class RoutesTest extends RoutesTestCase
{
    protected static function kernelClassInstance()
    {
        return \App\Http\Kernel::class;
    }

    protected function setUp()
    {
        parent::setUp();

        Auth::shouldReceive('chech')->andReturn(false);
    }

    /**
     * @return array
     */
    protected function routes()
    {
        return [
            /* path, http_method, excepted, [ctrl, [action, [params]]] */
            ['', 'GET', true, 'index', 'index'],
            ['/login', 'GET', false, 'errors', 'http404'],
            ['/login', 'POST', true, 'auth', 'login'],
            ['/signin', 'POST', false, 'errors', 'http404'],
            ['/signin', 'GET', true, 'auth', 'signin'],
        ];
    }
}
