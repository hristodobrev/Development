<?php

namespace Services\Projects;

use Models\Project;
use Services\BaseService;

class ProjectsService extends BaseService implements ProjectsServiceInterface
{
    /**
     * @param Project $project
     * @return bool
     */
    public function addProject(Project $project) : bool
    {
        $db = $this->getDB();
        $stmt = $db->prepare("INSERT INTO projects(`name`, `user_id`) VALUES(?, ?)");

        $stmt->bind_param('si', $project->getName(), $project->getUser()->getId());
        $stmt->execute();

        return $stmt->affected_rows == 1;
    }

    /**
     * @param int $userId
     * @return Project[]
     */
    public function getAllUserProjects(int $userId)
    {
        // TODO: Implement getAllUserProjects() method.
    }
}