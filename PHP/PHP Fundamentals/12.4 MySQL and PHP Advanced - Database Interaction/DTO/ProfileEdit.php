<?php

namespace DTO;


class ProfileEdit
{
    private $username;
    private $email;
    private $birthday;
    private $fullName;
    private $role;

    public function __construct($username, $email, $birthday, $fullName, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->fullName = $fullName;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    public function getRoles()
    {
        return [
            'USER',
            'ADMIN'
        ];
    }
}