<?php

abstract class BaseController
{
    protected $controllerName;
    protected $actionName;
    protected $isViewRendered = false;
    protected $isPost = false;
    protected $isLoggedIn = false;
    protected $title;
    protected $model;
    protected $validationErrors = [];

    function __construct($controllerName, $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        $this->isLoggedIn = isset($_SESSION['username']);

        $modelClassName = ucfirst(strtolower($this->controllerName)) . 'Model';
        if (class_exists($modelClassName)) {
            $this->model = new $modelClassName();
        }

        $this->onInit();
    }

    public function onInit()
    {

    }

    public function renderView(string $viewName = null, bool $includeLayout = true)
    {
        if (!$this->isViewRendered) {
            ob_start();
            if (!$viewName) {
                $viewName = $this->actionName;
            }
            $viewFileName = 'views/' . $this->controllerName . '/' . $viewName . '.php';
            include($viewFileName);
            $htmlFromView = ob_get_contents();
            ob_end_clean();

            if ($includeLayout) {
                include 'views/_layout/header.php';
            }
            echo $htmlFromView;
            if ($includeLayout) {
                include 'views/_layout/footer.php';
            }

            $this->isViewRendered = true;
        }
    }

    public function redirectToUrl(string $url)
    {
        header("Location: " . $url);
        die;
    }

    public function redirect(string $controllerName, string $actionName = null, array $params = null)
    {
        $url = APP_ROOT . '/' . urlencode($controllerName);
        if ($actionName) {
            $url .= '/' . urlencode($actionName);
        }

        if ($params) {
            $encodedParams = array_map($params, 'urlencode');
            $url .= implode('/', $encodedParams);
        }

        $this->redirectToUrl($url);
    }

    public function authorize()
    {
        if(!$this->isLoggedIn)
        {
            $this->addErrorMessage('Please login first.');
            $this->redirect('users', 'login');
        }
    }

    public function addMessage(string $msg, string $type)
    {
        if(!isset($_SESSION['messages']))
        {
            $_SESSION['messages'] = array();
        }

        array_push($_SESSION['messages'], ['text' => $msg, 'type' => $type]);
    }

    function addErrorMessage(string $msg)
    {
        $this->addMessage($msg, 'error');
    }

    function addInfoMessage(string $msg)
    {
        $this->addMessage($msg, 'info');
    }

    function setValidationError(string $fieldName, string $errorMsg)
    {
        $this->validationErrors[$fieldName] = $errorMsg;
    }

    function formValid() : bool
    {
        return count($this->validationErrors) == 0;
    }
}