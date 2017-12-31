<?php

namespace Models\View;


class ProfileEditViewModel
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $birthday;

    public function __construct($id, $username, $password, $email, $birthday)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $birthday;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
}