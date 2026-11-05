<?php

declare(strict_types=1);

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use App\Core\Models\User;

class AuthController extends ControllerBase
{
    public function registerAction()
    {
        $this->view->render('front/auth', 'register');
    }

    public function postRegisterAction()
    {
        $email = (string) $this->request->getPost('email', 'email');
        $name = (string) $this->request->getPost('name', 'string');
        $password = (string) $this->request->getPost('password');

        if ($password !== $this->request->getPost('confirm')) {
            return $this->failed('Password & confirm are different', 'register');
        }

        if (User::findFirst(['email = :email:', 'bind' => ['email' => $email]]) !== null) {
            return $this->failed('User already exist', 'register');
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $this->security->hash($password);

        if (!$user->save()) {
            return $this->failed(implode(' - ', ['Failed save user.', ...array_map(strval(...), $user->getMessages())]), 'register');
        }

        $this->flashSession->success('User created!');

        return $this->response->redirect('index');
    }

    public function loginAction()
    {
        $this->view->render('front/auth', 'login');
    }

    public function postLoginAction()
    {
        $credentials = [
            'email'    => (string) $this->request->getPost('email', 'email'),
            'password' => (string) $this->request->getPost('password'),
        ];

        // 2.0: attempt() returns a bool, the user is read with user().
        if (!$this->auth->attempt($credentials)) {
            return $this->failed('Wrong email/password', 'login');
        }

        $this->flashSession->success('Welcome ' . $this->auth->user()?->name);

        return $this->response->redirect('index');
    }

    public function logoutAction()
    {
        $this->auth->logout();

        return $this->response->redirect('index');
    }

    private function failed(string $message, string $action): void
    {
        $this->flash->error($message);
        $this->dispatcher->forward(['controller' => 'auth', 'action' => $action]);
    }
}
