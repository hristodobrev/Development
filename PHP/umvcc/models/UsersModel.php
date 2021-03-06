<?php

class UsersModel extends BaseModel
{
    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password FROM users WHERE username = ?"
        );

        $statement->bind_param('s', $username);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        if (password_verify($password, $result['password'])) {
            return $result['id'];
        }

        return false;
    }

    public function register(string $username, string $password, string $fullName)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $statement = self::$db->prepare(
            "INSERT INTO users(username, password, full_name) VALUES(?, ?, ?)"
        );

        $statement->bind_param('sss', $username, $passwordHash, $fullName);
        $statement->execute();

        if ($statement->affected_rows != 1) {
            return false;
        }

        $userId = self::$db->query('SELECT LAST_INSERT_ID()')->fetch_row()[0];
        return $userId;
    }
}