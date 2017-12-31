<?php

class HomeController extends BaseController
{
    public function index()
    {
        $model = new PostsModel();
        $this->posts = $model->getAll();
    }
}

?>