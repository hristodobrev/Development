<?php

namespace Controllers;

class ExternalController extends BaseController {
	public function random() {
		return json_encode(array('number' => rand(0, 100)));
	}
}