<?php

namespace ViewEngine;

use Core\Mvc\MvcContextInterface;

class View implements ViewInterface
{
    const VIEWS_FOLDER = 'Views';
    const VIEWS_EXTENSION = '.php';

    /** @var MvcContextInterface $mvcContext */
    private $mvcContext;

    public function __construct(MvcContextInterface $mvcContext)
    {
        $this->mvcContext = $mvcContext;
    }

    public function render($model = null, $viewName = null)
    {
        if ($viewName != null) {
            if (strstr($viewName, '.')) {
                include self::VIEWS_FOLDER . '/' . $viewName;
            } else {
                include self::VIEWS_FOLDER . '/' . $viewName . self::VIEWS_EXTENSION;
            }
        } else {
            $folder = ucfirst($this->mvcContext->getControllerName());
            $name = ucfirst($this->mvcContext->getActionName());
            $viewName = $folder . DIRECTORY_SEPARATOR . $name;
            include self::VIEWS_FOLDER . '/' . $viewName . self::VIEWS_EXTENSION;
        }
    }
}