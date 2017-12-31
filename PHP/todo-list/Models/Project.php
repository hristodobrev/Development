<?php

namespace Models;

class Project
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var User $user
     */
    private $user;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Note[] $notes
     */
    private $notes;

    /**
     * Project constructor.
     * @param int $id
     * @param User $user
     * @param string $name
     * @param Note[] $notes
     */
    public function __construct($id, User $user, $name, array $notes)
    {
        $this->id = $id;
        $this->user = $user;
        $this->name = $name;
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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Note[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }
}