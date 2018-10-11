<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Kernels\Http\Middleware\RedirectIfAuthenticated;
use Neutrino\Http\Middleware\Csrf;

/**
 * Class AuthController
 *
 * @package App\Kernels\Http\Modules\Frontend\Controllers
 */
class AuthController extends ControllerBase
{

    protected function onConstruct()
    {
        parent::onConstruct();

        $this->middleware(RedirectIfAuthenticated::class)->except(['logout']);
        $this->middleware(Csrf::class)->only(['postRegister', 'postLogin']);
    }

    /**
     * Register view.
     *
     * url (get) : /register
     */
    public function registerAction()
    {
        $this->view->render('front/auth', 'register');
    }

    /**
     * Register action.
     *
     * url (post) : /register
     */
    public function postRegisterAction()
    {
        // Get the data from the user
        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm');

        if ($password !== $confirm) {
            $this->flash->error('Password & confirm are different');

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action' => 'register',
            ]);

            return;
        }

        /** @var \App\Core\Models\User $userClass */
        $userClass = $this->config->auth->model;

        $user = $userClass::findFirst([
            $userClass::getAuthIdentifierName() . ' = :auth_identifier:',
            'bind' => [
                'auth_identifier' => $email,
            ],
        ]);

        if (!empty($user)) {
            $this->flash->error('User already exist');

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action' => 'register',
            ]);

            return;
        }

        /** @var \App\Core\Models\User $user */
        $user = new $userClass;

        $user->name = $name;
        $user->{$userClass::getAuthIdentifierName()} = $email;
        $user->{$userClass::getAuthPasswordName()} = $this->security->hash($password);

        if ($user->save() === false) {
            $messages = array_merge(['Failed save user.'], $user->getMessages());

            $this->flash->error(implode(' - ', $messages));

            $this->dispatcher->forward([
                'controller' => 'auth',
                'action' => 'register',
            ]);

            return;
        }

        $this->flashSession->success('User create successful !');

        $this->response->redirect('/index');
        $this->view->disable();

        return;
    }

    /**
     * Login view.
     *
     * url (get) : /login
     */
    public function loginAction()
    {
        $this->view->render('front/auth', 'login');
    }

    /**
     * Login action.
     *
     * url (post) : /login
     */
    public function postLoginAction()
    {
        // Get the data from the user
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->auth->attempt([
            'email' => $email,
            'password' => $password,
        ]);

        if (is_null($user)) {
            $this->flash->error('Wrong email/password');

            // Forward to the login form again
            $this->dispatcher->forward([
                'controller' => 'auth',
                'action' => 'login',
            ]);

            return;
        }

        $this->flashSession->success('Welcome ' . $user->name);

        // Forward to the 'invoices' controller if the user is valid
        $this->response->redirect('/index');
        $this->view->disable();

        return;
    }

    /**
     * Logout action.
     *
     * url (get) : /logout
     */
    public function logoutAction()
    {
        $this->auth->logout();

        $this->response->redirect('/index');
        $this->view->disable();

        return;
    }
}
