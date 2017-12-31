<?php

namespace Controllers;

class AdminController extends BaseController {
	public function login() {
		if (isset($_POST['username'])) {
			$user = $_POST['username'];
			$pass = $_POST['password'];

			$stmt = self::$db->prepare("SELECT * FROM users WHERE username = ?");
			$stmt->bind_param('s', $user);

			$stmt->execute();
			$result = $stmt->get_result()->fetch_assoc();

			if(password_verify($pass, $result['password_hash'])) {
				$_SESSION['user_id'] = $result['id'];
				$_SESSION['user_name'] = $result['username'];

				header('Location: /api-test/home/index');
				die();
			} else {
				$_SESSION['errors'] = 'Invalid username or password';
			}
		}

		return $this->view();
	}

	public function logout() {
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);

		header('Location: /api-test/home/login');
		die();
	}
}