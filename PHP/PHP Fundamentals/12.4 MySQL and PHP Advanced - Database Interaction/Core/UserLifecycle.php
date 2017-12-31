<?php

namespace Core;

use Exception;
use PDO;

class UserLifecycle
{
    /**
     * @var $db \PDO
     */
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __call($name, $arguments)
    {
        if (preg_match('/^get(.+)$/', $name, $matches)) {
            $columnName = strtolower($matches[1]);
            $username = $arguments[0];

            $query = "
                SELECT * FROM
                  users
                WHERE
                  username = ?
            ";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC)[$columnName];
        }
    }

    public function getUsers()
    {
        $query = "
            SELECT
              username,
              email,
              birthday,
              full_name
            FROM
             users
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function exists(string $username) : bool
    {
        $userExistsStatement = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $userExistsStatement->execute([$username]);
        return $userExistsStatement->rowCount() > 0;
    }

    public function isAdmin(string $username) : bool
    {
        $query = "SELECT role FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC)['role'] == 'ADMIN';
    }

    public function editProfile(string $username, array $data, array &$userInfo): bool
    {
        if ($username != $data['username'] && $this->exists($data['username'])) {
            throw new Exception('Username already taken');
        }

        $query = "
            UPDATE
              users
            SET
              username = ?,
              email = ?,
              birthday = ?,
              full_name = ?,
              role = ?
            WHERE
             username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $data['username'],
            $data['email'],
            $data['birthday'],
            $data['full-name'],
            $data['role'],
            $username
        ]);

        return $stmt->rowCount() > 0;
    }

    public function edit(string $username, array $data, array &$userInfo): bool
    {
        if ($username != $data['username'] && $this->exists($data['username'])) {
            throw new Exception('Username already taken');
        }

        $query = "
            UPDATE
              users
            SET
              username = ?,
              password = ?,
              email = ?,
              birthday = ?
            WHERE
             username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $data['username'],
            password_hash($data['password'], PASSWORD_BCRYPT),
            $data['email'],
            $data['birthday'],
            $username
        ]);

        if ($username == $_SESSION['user']) {
            $_SESSION['user'] = $data['username'];
        }

        return $stmt->rowCount() > 0;
    }

    public function login(string $username, string $password): bool
    {
        $query = "
            SELECT
              username,
              password
            FROM 
              users
            WHERE
              username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        if ($stmt->rowCount() <= 0) {
            return false;
        }

        $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $userInfo['password'])) {
            return true;
        }

        return false;
    }

    public function register(string $username,
                             string $password,
                             string $email,
                             DateTime $birthday,
                             string $fullName)
    {
        if ($this->exists($username)) {
            throw new Exception('Username already taken');
        }

        $stmt = $this->db->prepare("
            INSERT INTO 
              users (
                `username`,
                `password`,
                `email`,
                `birthday`,
                `full_name`,
                `role`
              ) VALUES (
                ?,
                ?,
                ?,
                ?,
                ?,
                'USER'
              )
        ");

        $stmt->execute([
            $username,
            password_hash($password, PASSWORD_BCRYPT),
            $email,
            $birthday->format('Y-m-d'),
            $fullName
        ]);

        return $stmt->rowCount() > 0;
    }

    public function isLogged() : bool
    {
        return isset($_SESSION['user']);
    }

    public function delete($username) : bool
    {
        $query = "DELETE FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        return $stmt->rowCount() > 0;
    }

    public function promote($username) : bool
    {
        $query = "UPDATE users SET role = ADMIN WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        return $stmt->rowCount() > 0;
    }

    public function demote($username) : bool
    {
        $query = "UPDATE users SET role = USER WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        return $stmt->rowCount() > 0;
    }
}