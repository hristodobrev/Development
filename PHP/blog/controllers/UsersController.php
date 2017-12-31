<?php

class UsersController extends BaseController
{
    public function onInit()
    {
        if ($this->actionName != 'login' && $this->actionName != 'register') {
            $this->authorize();
        }
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (strlen($username) < 3) {
                $this->setValidationError('username', 'Username must be at least 3 letters long.');
            }

            $password = $_POST['password'];
            if (strlen($password) < 6) {
                $this->setValidationError('password', 'Password must be at least 6 letters long.');
            }

            $confirmPassword = $_POST['confirm-password'];
            if ($password != $confirmPassword) {
                $this->setValidationError('confirm-password', 'The two passwords must match.');
            }

            $fullName = $_POST['full-name'];
            if (strlen($fullName) < 5) {
                $this->setValidationError('full-name', 'Full name must be at least 5 letters long.');
            }

            if ($this->formValid()) {
                $userId = $this->model->register($username, $password, $fullName);
                if ($userId) {
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['username'] = $username;
                    $this->addInfoMessage("Registered successfully.");
                    return $this->redirect('home');
                } else {
                    $this->addErrorMessage("Registration failed.");
                }
            }
        }
    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login($username, $password);
            if ($userId) {
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Logged in successfully.");
                return $this->redirect('home');
            } else {
                $this->addErrorMessage("Login failed.");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->addInfoMessage('Successfully logged out.');
        $this->redirect('');
    }
}
