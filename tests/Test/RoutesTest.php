<?php

namespace Test;

use Neutrino\Test\RoutesTestCase;

/**
 * Class RoutesTest
 */
class RoutesTest extends RoutesTestCase
{
    protected static function kernelClassInstance()
    {
        return \App\Kernels\Http\Modules\Frontend\Module::class;
    }

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @return array
     */
    protected function routes()
    {
        return [
            /* path, http_method, excepted, [ctrl, [action, [params]]] */
            ['', 'GET', true, 'index', 'index'],
            ['/login', 'GET', true, 'auth', 'login'],
            ['/login', 'POST', true, 'auth', 'postLogin'],
            ['/register', 'GET', true, 'auth', 'register'],
            ['/register', 'POST', true, 'auth', 'postRegister'],
            ['/logout', 'GET', true, 'auth', 'logout'],
            ['/logout', 'POST', false, 'errors', 'http404'],
            ['/signin', 'POST', false, 'errors', 'http404'],
            ['/signin', 'GET', false, 'errors', 'http404'],
        ];
    }
}
