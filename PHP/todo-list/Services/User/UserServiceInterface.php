<?php

namespace Services\User;

use Models\User;

interface UserServiceInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id);

    /**
     * @param string $username
     * @return User|null
     */
    public function getUserByUsername(string $username);

    /**
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail(string $email);

    /**
     * @param User $user
     * @return bool
     */
    public function registerUser(User $user) : bool;
}