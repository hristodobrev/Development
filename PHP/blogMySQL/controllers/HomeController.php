<?php

class HomeController extends BaseController
{
    function index()
    {
        $lastPosts = $this->model->getLastPosts(5);
        $this->sidebarPosts = $lastPosts;

        if ($this->isPost && $_POST['pattern'] != "") {
            $pattern = $_POST['pattern'];
            $this->posts = $this->model->getPostsByPattern($pattern);
        } else {
            $this->posts = array_slice($lastPosts, 0, 3);
        }
    }

    function view($id)
    {
        $this->post = $this->model->getPostById($id);
    }
}
