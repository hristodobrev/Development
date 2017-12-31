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

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}