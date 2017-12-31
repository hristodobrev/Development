<?php

class UsersController extends BaseController
{
    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login($username, $password);
            if ($userId) {
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Login successful.");
                $this->redirect('home');
            } else {
                $this->addErrorMessage("Incorrect username or password.");
                $this->redirect('users', 'login');
            }
        }
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $fullName = $_POST['full-name'];

            if (count($username) < 5) {
                $this->setValidationError('username', "Username must be at least 5 characters long.");
            }

            if (count($password) < 6) {
                $this->setValidationError('password', "Password must be at least 6 characters long.");
            }

            if (count($fullName) < 5) {
                $this->setValidationError('full-name', "Full name must be at least 5 characters long.");
            }

            if ($password != $confirmPassword) {
                $this->setValidationError('confirm-password', "Passwords must match!");
            }

            if ($this->formValid()) {
                $userId = $this->model->register($username, $password, $fullName);
                if ($userId) {
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['username'] = $username;
                    $this->addInfoMessage("Registration successful.");
                    $this->redirect('home');
                } else {
                    $this->addErrorMessage("Registration failed.");
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('home');
    }
}