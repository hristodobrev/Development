<?php

class HomeController extends BaseController
{
    function index() {
        $posts = $this->model->getLatestPosts();
        $this->posts = array_slice($posts, 0, 3);
        $this->sidebarPosts = $posts;
    }
	
	function view($id) {
        $post = $this->model->getPostById($id);
        $this->post = $post;
    }
}
