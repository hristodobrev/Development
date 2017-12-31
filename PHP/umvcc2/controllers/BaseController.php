<?php

abstract class BaseController
{
    protected $controllerName;
    protected $actionName;
    protected $model;
    protected $title = "";
    protected $isPost = false;
    protected $viewRendered = false;
    protected $isLogged = false;
    protected $validationErrors = [];

    public function __construct($controllerName, $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        $modelClassName = ucfirst(strtolower($controllerName)) . "Model";
        if (class_exists($modelClassName)) {
            $this->model = new $modelClassName();
        }

        $this->isLogged = isset($_SESSION['username']);
    
        $this->onInit();
    }
    
    public function onInit() {

    }

    public function authorize()
    {
        if (!$this->isLogged) {
            $this->addErrorMessage("You have to be logged in to do this.");
            $this->redirect('users', 'login');
        }
    }

    public function renderView(bool $includeLayout = true)
    {
        if (!$this->viewRendered) {
            $viewFile = 'views/' . strtolower($this->controllerName) . '/' . strtolower($this->actionName) . '.php';
            if (file_exists($viewFile)) {
                ob_start();
                if ($includeLayout) {
                    include 'views/_layout/header.php';
                }

                include $viewFile;

                if ($includeLayout) {
                    include 'views/_layout/footer.php';
                }

                $html = ob_get_contents();
                ob_clean();

                echo $html;
                $this->viewRendered = true;
            }
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

        if ($actionName != null) {
            $url .= '/' . urlencode($actionName);
        }

        if ($params != null) {
            $encodedParams = array_map($params, 'urlencode');
            $url .= implode('/', $encodedParams);
        }

        $this->redirectToUrl($url);
    }

    public function addMessage(string $msg, string $type)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }

        array_push($_SESSION['messages'], array('type' => $type, 'message' => $msg,));
    }

    public function addErrorMessage(string $msg)
    {
        $this->addMessage($msg, 'error');
    }

    public function addInfoMessage(string $msg)
    {
        $this->addMessage($msg, 'info');
    }

    public function addSuccessMessage(string $msg)
    {
        $this->addMessage($msg, 'success');
    }

    public function setValidationError(string $fieldName, string $message)
    {
        $this->validationErrors[$fieldName] = $message;
    }

    public function formValid() : bool
    {
        return count($this->validationErrors) == 0;
    }
}

?>