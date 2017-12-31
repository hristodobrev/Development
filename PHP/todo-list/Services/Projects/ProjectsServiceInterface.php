<?php

namespace Services\Projects;

use Models\Project;

interface ProjectsServiceInterface
{
    /**
     * @param Project $project
     * @return bool
     */
    public function addProject(Project $project) : bool;

    /**
     * @param int $userId
     * @return Project[]
     */
    public function getAllUserProjects(int $userId);
}