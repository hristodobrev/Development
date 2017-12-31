<?php

namespace Core\Mvc;


class MvcContext implements MvcContextInterface
{
    /**
     * @var string
     */
    private $controllerName;
    /**
     * @var string
     */
    private $actionName;
    /**
     * @var array
     */
    private $params;

    public function __construct(string $controllerName, string $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    function getControllerName() : string
    {
        return $this->controllerName;
    }

    function getActionName() : string
    {
        return $this->actionName;
    }

    function getParams() : array
    {
        return $this->params;
    }
}