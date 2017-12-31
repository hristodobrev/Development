<?php

namespace Controllers;

use Core\Session\SessionInterface;
use Models\Project;
use ViewEngine\ViewInterface;

class ProjectsController extends BaseController
{
    public function __construct(SessionInterface $session)
    {
        parent::__construct($session);
        $this->authenticate();
    }

    public function all(ViewInterface $view)
    {
        if (isset($_SESSION['add-project'])) {
            $projectName = $_SESSION['project-name'];
            $userId = $this->getUser()->getId();

            $project = new Project()
        }

        $view->render();
    }
}