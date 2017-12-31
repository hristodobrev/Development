<?php

namespace Controllers;

abstract class BaseController extends DBController {
    protected $viewRendered = false;
    protected $controllerName;
    protected $actionName;
    protected $isLogged = false;

	public function __construct($controllerName, $actionName) {
		parent::__construct();

		$this->controllerName = $controllerName;
		$this->actionName = $actionName;

        $this->isLogged = isset($_SESSION['user_name']);

		$this->init();
	}

    public function init() {
        
    }

	public function authenticate() 
	{
		if (!isset($_SESSION['user_id'])) {
            header('Location: /api-test/admin/login');
            die();
		}
	}

	public function view($viewData = [])
    {
        if (!$this->viewRendered) {
            $viewFile = './views/' . strtolower($this->controllerName) .
                        '/' . strtolower($this->actionName) . '.php';
            if (file_exists($viewFile)) {
                ob_start();
                include './views/_layout/header.php';
                include $viewFile;

                $html = ob_get_contents();
                ob_clean();

                $this->viewRendered = true;
                return $html;
            }
        }
    }
}