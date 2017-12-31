<?php

class HomeModel extends BaseModel
{
    public function getLatestPosts(int $maxCount = 5) : array
    {
        $statement = self::$db->query(
            "SELECT p.id, p.title, p.content, p.date, u.full_name " .
            "FROM posts p LEFT JOIN users u ON u.id = p.user_id " .
            "ORDER BY date DESC LIMIT $maxCount"
        );

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT p.id, p.title, p.content, p.date, u.full_name " .
            "FROM posts p LEFT JOIN users u ON u.id = p.user_id " .
            "WHERE p.id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }
}
