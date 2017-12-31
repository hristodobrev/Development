<?php

namespace Controllers;

class FilesController extends BaseController {
	public function read() {

		$directory = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_SESSION['user_name'] .
		DIRECTORY_SEPARATOR . $_POST['fileName'];

		$pathInfo = pathInfo($directory, PATHINFO_EXTENSION);
		if ($pathInfo == 'jpeg' || $pathInfo == 'jpg' || $pathInfo == 'png') {
			return json_encode(array(
					'image' => true,
					'url' => substr($directory, 2)
				));
		}
		
		return json_encode(file_get_contents($directory));
	}

	public function delete() {
		$directory = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_SESSION['user_name'] .
		DIRECTORY_SEPARATOR . $_POST['fileName'];

		unlink($directory);
	}
}