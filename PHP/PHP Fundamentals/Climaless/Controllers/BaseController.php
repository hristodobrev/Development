<?php
class BaseController {
    private $useLayout = true;

    function __construct()
    {
        $this->useLayout = true;
    }

    function redirectToUrl($url) {
        header('Location:' . $url);
        die;
    }

    function renderView($viewName, $viewData) {
        if ($this->useLayout) {
            include "./Views/Layouts/main.php";
        } else {
            include "./Views/$viewName.php";
        }
    }
}