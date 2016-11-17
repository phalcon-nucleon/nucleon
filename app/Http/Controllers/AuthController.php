<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Guest as GuestMiddleware;
use Luxury\Constants\Events;
use Luxury\Support\Facades\Auth;
use Phalcon\Db\Adapter\Pdo;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends ControllerBase
{

    protected function onConstruct()
    {
        parent::onConstruct();

        $this->middleware(GuestMiddleware::class)->except(['logout']);
    }

    /**
     * The Register action.
     *
     * url (get) : /register
     */
    public function registerAction()
    {
        $this->view->render('auth', 'register');
    }

    /**
     * The Register action.
     *
     * url (post) : /register
     */
    public function postRegisterAction()
    {
        // Get the data from the user
        $email    = $this->request->getPost('email');
        $name     = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm');

        if ($password !== $confirm) {
            $this->flash->error('Password & confirm are different');

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action'     => 'register'
            ]);

            return;
        }

        /** @var \App\Models\User $userClass */
        $userClass = $this->config->auth->model;

        $user = $userClass::findFirst([
            $userClass::getAuthIdentifierName() . ' = :auth_identifier:',
            'bind' => [
                'auth_identifier' => $email
            ]
        ]);

        if (!empty($user)) {
            $this->flash->error('User already exist');

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action'     => 'register'
            ]);

            return;
        }

        /** @var \App\Models\User $user */
        $user = new $userClass;

        $user->name                                  = $name;
        $user->{$userClass::getAuthIdentifierName()} = $email;
        $user->{$userClass::getAuthPasswordName()}   = $this->security->hash($password);

        if ($user->save() === false) {
            $messages = array_merge(['Failed save user.'], $user->getMessages());

            $this->flash->error(implode(' - ', $messages));

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action'     => 'register'
            ]);

            return;
        }

        $this->flash->success('User create successful !');

        $this->response->redirect('/');
        $this->view->disable();

        return;
    }

    /**
     * The Register action.
     *
     * url (get) : /register
     */
    public function loginAction()
    {
        $this->view->render('auth', 'login');
    }

    /**
     * The Login action.
     *
     * http://localhost/phalcon-lust/auth/login
     */
    public function postLoginAction()
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
                'action'     => 'login'
            ]);

            return;
        }

        $this->flash->success('Welcome ' . $user->name);

        // Forward to the 'invoices' controller if the user is valid
        $this->response->redirect('/');
        $this->view->disable();

        return;
    }

    public function logoutAction()
    {
        Auth::logout();

        $this->response->redirect('/');
        $this->view->disable();

        return;
    }
}
