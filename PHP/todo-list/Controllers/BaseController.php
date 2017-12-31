<?php

namespace Controllers;

use Core\Config;
use Core\Session\Session;
use Core\Session\SessionInterface;
use Models\User;

abstract class BaseController
{
    /**
     * @var SessionInterface $session
     */
    private $session;

    /**
     * @var User $user
     */
    private $user;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @return SessionInterface
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function addError($errorMessage)
    {
        $errors = $this->session->get('errors') || [];
        $errors[] = $errorMessage;

        $this->session->set('errors', $errors);
    }

    public function authenticate()
    {
        if (!$this->session->exists('user')) {
            $this->redirectTo('user', 'login');
            die;
        }
    }

    public function redirectToRoute($route)
    {
        header('Location: /' . Config::APP_NAME . '/' . $route);
        die;
    }

    public function redirectTo($controllerName, $actionName)
    {
        header('Location: /' . Config::APP_NAME . '/' . $controllerName . '/' . $actionName);
        die;
    }
}