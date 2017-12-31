<?php

namespace Controllers;
use Core\Session\SessionInterface;
use ViewEngine\ViewInterface;

/**
 * Class HomeController
 * @package Controllers
 * @test
 */
class HomeController extends BaseController
{
    public function __construct(SessionInterface $session)
    {
        parent::__construct($session);
        $this->authenticate();
    }

    public function index(ViewInterface $view)
    {
        $user = $this->getSession()->get('user');

        $view->render([
            'user' => $user
        ]);
    }

    public function news(ViewInterface $view)
    {
        $view->render();
    }
}