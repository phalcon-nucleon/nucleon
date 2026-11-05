<?php

declare(strict_types=1);

namespace Test;

use App\Kernels\Http\Kernel;
use Neutrino\Config\Loader;
use Neutrino\Test\RoutesTestCase;

/**
 * Every route of routes/http.php is tested (testRoutesTested() fails on a route missing below).
 */
class RoutesTest extends RoutesTestCase
{
    protected static function kernelClassInstance(): string
    {
        return Kernel::class;
    }

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::setConfig(Loader::load(BASE_PATH));
    }

    protected static function routes(): array
    {
        return [
            // path, http method, expected, controller, action, params
            ['', 'GET', true, 'home', 'index'],
            ['/exception-test', 'GET', true, 'errors', 'throwException'],
            ['/index', 'GET', true, 'index', 'index'],
            ['/login', 'GET', true, 'auth', 'login'],
            ['/login', 'POST', true, 'auth', 'postLogin'],
            ['/register', 'GET', true, 'auth', 'register'],
            ['/register', 'POST', true, 'auth', 'postRegister'],
            ['/logout', 'GET', true, 'auth', 'logout'],
            ['/back/index/index', 'GET', true, 'index', 'index'],
            ['/logout', 'POST', false, 'errors', 'http404'],
            ['/signin', 'POST', false, 'errors', 'http404'],
            ['/signin', 'GET', false, 'errors', 'http404'],
        ];
    }
}
