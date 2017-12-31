<?php

class UsersModel extends BaseModel
{
    public function getUsers(int $exceptUserId = 0)
    {
        $statement = self::$db->prepare("SELECT * FROM users WHERE id != ?");
        $statement->bind_param("i", $exceptUserId);
        $statement->execute();

        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        for ($i = 0; $i < count($result); $i++) {
            unset($result[$i]['password']);
        }

        return $result;
    }

    public function getUserById(int $userId)
    {
        $statement = self::$db->prepare("SELECT * FROM users WHERE id = ?");

        $statement->bind_param("i", $userId);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        unset($result['password']);

        return $result;
    }

    public function changePassword($userId, $oldPassword, $newPassword) : bool
    {
        $statement = self::$db->prepare("SELECT password FROM users WHERE id = ?");
        $statement->bind_param("i", $userId);
        $statement->execute();

        $currentPassword = $statement->get_result()->fetch_assoc()['password'];
        if (password_verify($oldPassword, $currentPassword)) {
            $statement = self::$db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $statement->bind_param("si", $passwordHash, $userId);
            $statement->execute();

            return $statement->affected_rows == 1;
        } else {
            throw new Error('The password you entered is wrong.');
        }

        return false;
    }

    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare("SELECT * FROM users WHERE username = ?");

        $statement->bind_param("s", $username);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();

        if (!password_verify($password, $result['password'])) {
            return false;
        }

        return $result['id'];
    }

    public function register(string $username, string $password, string $fullName)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if ($fullName) {
            $statement = self::$db->prepare(
                "INSERT INTO users(username, password, full_name) VALUES(?, ?, ?)"
            );
            $statement->bind_param("sss", $username, $passwordHash, $fullName);
        } else {
            $statement = self::$db->prepare(
                "INSERT INTO users(username, password) VALUES(?, ?)"
            );
            $statement->bind_param("ss", $username, $passwordHash);
        }
        $statement->execute();

        if ($statement->affected_rows != 1) {
            if ($statement->errno == 1062) {
                throw new Error('A user with the same name already exists.');
            }

            return false;
        }

        $userId = self::$db->query("SELECT LAST_INSERT_ID()");
        return $userId;
    }
}

?>