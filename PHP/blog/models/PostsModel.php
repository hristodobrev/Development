<?php

class PostsModel extends BaseModel
{
    public function getAll() : array
    {
        $statement = self::$db->query(
            "SELECT p.id, p.title, p.content, p.date, u.full_name " .
            "FROM posts p LEFT JOIN users u ON u.id = p.user_id " .
            "ORDER BY p.date DESC"
        );

        $result = $statement->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT p.title, p.content, p.date, u.full_name " .
            "FROM posts p LEFT JOIN users u ON u.id = p.user_id ".
            "WHERE p.id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $title, string $content, int $userId) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO posts(title, content, user_id) VALUES(?, ?, ?)"
        );
        $statement->bind_param("ssi", $title, $content, $userId);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    public function edit(int $id, string $title, string $content, $date, int $userId) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE posts SET title = ?, content = ?, date = ?, user_id = ? WHERE id = ?"
        );
        $statement->bind_param("sssii", $title, $content, $date, $userId, $id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }
}