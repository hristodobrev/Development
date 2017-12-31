<?php

namespace Controllers;

use Core\Config;
use Models\User;
use Services\User\UserServiceInterface;
use ViewEngine\ViewInterface;

class UserController extends BaseController
{
    public function login(ViewInterface $view, UserServiceInterface $userService)
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $userService->getUserByUsername($username);
            if (!$user || !password_verify($password, $user->getPassword())) {
                $this->addError('Invalid username or password.');
                $this->redirectTo('user', 'login');
                die;
            }

            $this->getSession()->set('user', $user);
            $this->setUser($user);
            $this->redirectTo('home', 'index');
            die;
        }

        $view->render();
    }

    public function register(ViewInterface $view, UserServiceInterface $userService)
    {
        if (isset($_POST['register'])) {
            $specialToken = $_POST['special-token'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if ($specialToken != Config::SPECIAL_TOKEN) {
                $this->addError('Invalid special token.');
                $this->redirectTo('user', 'register');
                die;
            }

            if ($userService->getUserByUsername($username) != null) {
                $this->addError('This username is already taken.');
                $this->redirectTo('user', 'register');
                die;
            }

            if ($userService->getUserByEmail($email) != null) {
                $this->addError('This email is already taken.');
                $this->redirectTo('user', 'register');
                die;
            }

            $user = new User(
                $username,
                $password,
                $email
            );

            if($userService->registerUser($user)) {
                $user = $userService->getUserByUsername($username);
                $this->getSession()->set('user', $user);
                $this->setUser($user);
                $this->redirectTo('home', 'index');
                die;
            } else {
                $this->addError('Registration failed. Please try again later.');
                $this->redirectTo('user', 'register');
                die;
            }
        }

        $view->render();
    }

    public function logout()
    {
        $this->getSession()->remove('user');
        $this->setUser(null);
        $this->redirectTo('user', 'login');
        die;
    }
}