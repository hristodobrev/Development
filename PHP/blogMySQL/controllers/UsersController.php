<?php

class UsersController extends BaseController
{
    public function index()
    {
        $this->authorize();
        $this->users = $this->model->getAll();
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (strlen($username) < 2 || strlen($username) > 50) {
                $this->setValidationError("username", "Username's length must be in range [2-50].");
            }

            $password = $_POST['password'];
            if (strlen($password) < 2 || strlen($password) > 50) {
                $this->setValidationError("password", "Password's length must be in range [2-50].");
            }

            $confirm_password = $_POST['confirm_password'];
            if ($confirm_password != $password) {
                $this->setValidationError("confirm_password", "The two passwords do not match.");
            }

            $full_name = $_POST["full_name"];
            if (strlen($full_name) > 200) {
                $this->setValidationError("full_name", "Full name can have maximum 200 symbols.");
            }

            if ($this->formValid()) {
                $user_id = $this->model->register($username, $password, $full_name);
                if ($user_id) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $this->addInfoMessage("Registration successful.");
                    $this->redirect("posts");
                } else {
                    $this->addErrorMessage("Error: Registration failed.");
                }
            }
        }
    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loggedUserId = $this->model->login($username, $password);
            if ($loggedUserId) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $loggedUserId;
                $this->addInfoMessage("Login successful.");
                return $this->redirect("posts");
            } else {
                $this->addErrorMessage("Error: Login failed!");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("Logout successful.");
        $this->redirect("");
    }
}
