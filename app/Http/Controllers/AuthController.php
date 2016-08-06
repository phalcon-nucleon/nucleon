<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Guest as GuestMiddleware;
use Luxury\Support\Facades\Auth;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends ControllerBase
{
    /**
     * The Sign-in action.
     *
     * http://localhost/phalcon-lust/auth/signin
     */
    public function signinAction()
    {
        // Nothing here, implicit view used.
    }

    /**
     * The Login action.
     *
     * http://localhost/phalcon-lust/auth/login
     */
    public function loginAction()
    {
        // Get the data from the user
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Auth::attempt([
            'email'    => $email,
            'password' => $password,
        ]);

        if (is_null($user)) {
            $this->flash->error('Wrong email/password');

            // Forward to the login form again
            $this->dispatcher->forward([
                'controller' => 'auth',
                'action'     => 'signin'
            ]);

            return;
        }

        $this->flash->success('Welcome ' . $user->name);

        // Forward to the 'invoices' controller if the user is valid
        $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index'
        ]);

        return;
    }

    protected function onConstruct()
    {
        parent::onConstruct();

        $this->middleware(new GuestMiddleware());
    }
}
