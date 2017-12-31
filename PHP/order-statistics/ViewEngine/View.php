<?php

namespace ViewEngine;

use Core\Mvc\MvcContextInterface;

class View implements ViewInterface
{
    const VIEWS_FOLDER = 'Views';
    const VIEWS_EXTENSION = '.php';

    /***
     * @var MvcContextInterface $mvcContext
     */
    private $mvcContext;

    public function __construct(MvcContextInterface $mvcContext)
    {
        $this->mvcContext = $mvcContext;
    }

    public function render($model = null, $viewName = null)
    {
        if ($viewName != null) {
            if (strstr($viewName, '.')) {
                include self::VIEWS_FOLDER . DIRECTORY_SEPARATOR . $viewName;
            } else {
                include self::VIEWS_FOLDER . DIRECTORY_SEPARATOR . $viewName . self::VIEWS_EXTENSION;
            }
        } else {
            include self::VIEWS_FOLDER . DIRECTORY_SEPARATOR .
                $this->mvcContext->getControllerName() .
                DIRECTORY_SEPARATOR . $this->mvcContext->getActionName() . self::VIEWS_EXTENSION;
        }
    }
}