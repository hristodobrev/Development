<?php

class PostsModel extends BaseModel
{
    public function getAll() : array
    {
        $statement = self::$db->query(
            "SELECT p.img_name, p.title, p.content, p.date, " .
            "IFNULL(u.full_name, u.username) AS author, u.id " .
            "FROM posts p LEFT JOIN users u ON p.author_id = u.id"
        );

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserPosts(int $userId) : array
    {
        $statement = self::$db->prepare(
            "SELECT p.img_name, p.title, p.content, p.date, " .
            "IFNULL(u.full_name, u.username) AS author, u.id " .
            "FROM posts AS p LEFT JOIN users AS u ON p.author_id = u.id " .
            "WHERE author_id = ?"
        );
        $statement->bind_param("i", $userId);
        $statement->execute();

        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById(int $postId)
    {
        $statement = self::$db->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i", $postId);
        $statement->execute();

        return $statement->get_result()->fetch_assoc();
    }

    public function create($imgName = null, string $title, string $content, int $authorId) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO posts(img_name, title, content, author_id) " .
            "VALUES(?, ?, ?, ?)"
        );
        $statement->bind_param("sssi", $imgName, $title, $content, $authorId);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    public function edit(int $postId, string $title, string $content) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE posts SET title = ?, content = ? " .
            "WHERE id = ?"
        );
        $statement->bind_param("ssi", $title, $content, $postId);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    public function delete(int $postId) : bool
    {
        $statement = self::$db->prepare("DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i", $postId);
        $statement->execute();

        return $statement->affected_rows == 1;
    }
}

?>