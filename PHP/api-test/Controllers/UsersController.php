<?php

namespace Controllers;

class UsersController extends BaseController {
	public function init() {
		$this->authenticate();
	}

	public function all()
	{
		$stmt = self::$db->prepare("SELECT id, username FROM users");

		$stmt->execute();
		$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

		return json_encode($result);
	}

	public function add() {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$stmt = self::$db->prepare("INSERT INTO users(`username`, `password_hash`) VALUES(?, ?)");

		$stmt->bind_param('ss', $username, password_hash($password, PASSWORD_DEFAULT));
		$stmt->execute();

		if ($stmt->affected_rows == 1) {
			return self::$db->query("SELECT LAST_INSERT_ID()");
		} else {
			return false;
		}
	}

	public function viewUser($id)
	{
		$stmt = self::$db->prepare("SELECT * FROM users WHERE id = ?");

		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

		return json_encode($result);
	}
}