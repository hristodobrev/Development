<?php

namespace Core\Mvc;

class MvcContext implements MvcContextInterface
{
    private $controllerName;
    private $actionName;
    private $params;

    public function __construct($controllerName, $actionName, $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }
}