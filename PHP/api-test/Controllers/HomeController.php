<?php

namespace Controllers;

class HomeController extends BaseController {
	public function init() {
		$this->authenticate();
	}

	public function index() {
		return $this->view();
	}

	public function upload() {
		if (isset($_POST['submit'])) {
			$directory = './uploads' .
						DIRECTORY_SEPARATOR . $_SESSION['user_name'] .
						DIRECTORY_SEPARATOR;
			if (!file_exists($directory)) {
				mkdir($directory);
			}

			$targetFile = $directory . basename($_FILES['fileToUpload']['name']);
			$pathInfo = pathInfo($targetFile, PATHINFO_EXTENSION);

			if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
				echo 'File uploaded successfully';
			} else {
				echo 'Failed to upload file';
			}
		}
	
		return $this->view();
	}

	public function files() {
		$directoryPath = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_SESSION['user_name'];
		if (file_exists($directoryPath)) {
			$fileNames = [];
			$directoryIterator = new \DirectoryIterator($directoryPath);
			foreach ($directoryIterator as $directory) {
				if ($directory->getFileName() != '.' && $directory->getFileName() != '..') {
					$fileNames[] = $directory->getFileName();
				}
			}
		}

		return $this->view([
				'fileNames' => $fileNames
			]);
	}
}