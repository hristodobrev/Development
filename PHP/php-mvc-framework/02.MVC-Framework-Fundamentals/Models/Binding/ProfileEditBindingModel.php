<?php

namespace Models\Binding;

class ProfileEditBindingModel
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $birthday;

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