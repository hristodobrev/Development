<?php

namespace Services\User;

use Models\User;
use Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    public function getUserById(int $id)
    {
        $db = $this->getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->bind_param('i', $id);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if (!$result) {
            return null;
        }

        $user = new User(
            $result['id'],
            $result['username'],
            $result['password'],
            $result['email'],
            $result['date_created'],
            $result['last_updated']
        );

        return $user;
    }

    public function getUserByUsername(string $username)
    {
        $db = $this->getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if (!$result) {
            return null;
        }

        $user = new User(
            $result['id'],
            $result['username'],
            $result['password'],
            $result['email'],
            new \DateTime($result['date_created']),
            new \DateTime($result['last_updated'])
        );

        return $user;
    }

    public function getUserByEmail(string $email)
    {
        $db = $this->getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if (!$result) {
            return null;
        }

        $user = new User(
            $result['id'],
            $result['username'],
            $result['password'],
            $result['email'],
            new \DateTime($result['date_created']),
            new \DateTime($result['last_updated'])
        );

        return $user;
    }

    public function registerUser(User $user) : bool
    {
        $db = $this->getDB();

        $stmt = $db->prepare('INSERT INTO users(username, password, email) VALUES(?, ?, ?)');
        $stmt->bind_param('sss',
            $user->getUsername(),
            password_hash($user->getPassword(), PASSWORD_BCRYPT),
            $user->getEmail());

        $stmt->execute();

        return $stmt->affected_rows == 1;
    }
}