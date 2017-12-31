<?php

namespace DTO;

class Profile
{
    private $username;
    private $password;
    private $email;
    private $birthday;

    public function __construct($username, $password, $email, $birthday)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $birthday;
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