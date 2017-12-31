<?php

namespace ViewEngine;

use Core\Mvc\MvcContextInterface;
use Core\Session\SessionInterface;

class View implements ViewInterface
{
    const VIEWS_FOLDER = 'Views';
    const VIEWS_EXTENSION = '.php';

    /**
     * @var MvcContextInterface $mvcContext
     */
    private $mvcContext;

    /**
     * @var SessionInterface $session
     */
    private $session;

    public function __construct(MvcContextInterface $mvcContext, SessionInterface $session)
    {
        $this->mvcContext = $mvcContext;
        $this->session = $session;
    }

    public function isLoggedIn()
    {
        return $this->session->exists('user');
    }

    public function getErrors()
    {
        if ($this->session->exists('errors')) {
            return $this->session->get('errors');
        }

        return [];
    }

    public function clearErrors()
    {
        $this->session->remove('errors');
    }

    public function render($viewData = null, $viewName = null, $useLayout = true)
    {
        if ($useLayout) {
            include_once $this::VIEWS_FOLDER . DIRECTORY_SEPARATOR . 'Layout' . DIRECTORY_SEPARATOR . 'header.php';
        }

        if ($viewName) {
            if (strstr($viewName, '.php')) {
                include_once $this::VIEWS_FOLDER . DIRECTORY_SEPARATOR . $viewName;
            } else {
                include_once $this::VIEWS_FOLDER . DIRECTORY_SEPARATOR . $viewName . $this::VIEWS_EXTENSION;
            }
        } else {
            $folder = $this::VIEWS_FOLDER . DIRECTORY_SEPARATOR . $this->mvcContext->getControllerName();
            $file = DIRECTORY_SEPARATOR . $this->mvcContext->getActionName() . $this::VIEWS_EXTENSION;
            include_once $folder . $file;
        }

        if ($useLayout) {
            include_once $this::VIEWS_FOLDER . DIRECTORY_SEPARATOR . 'Layout' . DIRECTORY_SEPARATOR . 'footer.php';
        }
    }
}