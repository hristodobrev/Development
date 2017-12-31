<?php

class MessagesModel extends BaseModel
{
    public function getMessages($senderId, $recieverId)
    {
        $statement = self::$db->prepare(
            "SELECT message, date, reciever_id FROM messages AS msg " .
            "WHERE (msg.sender_id = ? AND msg.reciever_id = ?) OR (msg.sender_id = ? AND msg.reciever_id = ?) " .
            "ORDER BY date"
        );
        $statement->bind_param("iiii", $senderId, $recieverId, $recieverId, $senderId);
        $statement->execute();

        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function sendMessage($senderId, $recieverId, $message) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO messages(sender_id, reciever_id, message) " .
            "VALUES(?, ?, ?)"
        );
        $statement->bind_param("iis", $senderId, $recieverId, $message);
        $statement->execute();

        return $statement->affected_rows == 1;
    }
}

?>