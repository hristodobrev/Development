<?php

namespace Models;

class Note
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $text
     */
    private $text;

    /**
     * @var Project $project
     */
    private $project;

    /**
     * @var Note[] $notes
     */
    private $notes;

    /**
     * Note constructor.
     * @param int $id
     * @param string $text
     * @param Project $project
     * @param Note[] $notes
     */
    public function __construct($id, $text, Project $project, array $notes)
    {
        $this->id = $id;
        $this->text = $text;
        $this->project = $project;
        $this->notes = $notes;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @return Note[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }
}