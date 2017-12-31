<?php

class PostsController extends BaseController
{
    public function onInit()
    {
        $this->authorize();
    }

    public function index()
    {
        $this->posts = $this->model->getAll();
    }

    public function create()
    {
        if ($this->isPost) {
            $title = $_POST['title'];
            if (strlen($title) < 1) {
                $this->setValidationError('title', 'Title cannot be empty');
            }
            $content = $_POST['content'];
            if (strlen($content) < 1) {
                $this->setValidationError('content', 'Content cannot be empty');
            }
            $userId = $_SESSION['user_id'];
            if ($this->model->create($title, $content, $userId)) {
                $this->addInfoMessage('Post created successfully.');
                $this->redirect('posts');
            } else {
                $this->addErrorMessage('Create post failed.');
            }
        }
    }

    public function delete(int $id)
    {
        if($this->isPost) {
            if ($this->model->delete($id)) {
                $this->addInfoMessage("Post deleted.");
                $this->redirect("posts");
            } else {
                $this->addErrorMessage("Could not delete post.");
            }
        } else {
            $post = $this->model->getById($id);
            if (!$post) {
                $this->addErrorMessage("Post does not exist.");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }

    public function edit(int $id)
    {
        if ($this->isPost) {
            $title = $_POST['title'];
            if (strlen($title) < 1) {
                $this->setValidationError('title', 'Title cannot be empty.');
            }
            $content = $_POST['content'];
            if (strlen($content) < 1) {
                $this->setValidationError('content', 'Content cannot be empty.');
            }
            $date = $_POST['date'];
            $userId = $_POST['user-id'];
            if ($userId < 0 || $userId > 1000000) {
                $this->setValidationError('user-id', 'Invalid author.');
            }
            if ($this->formValid()) {
                if ($this->model->edit($id, $title, $content, $date, $userId)) {
                    $this->addInfoMessage("Post edited successfully.");
                    $this->redirect("posts");
                } else {
                    $this->addErrorMessage("Failed to edit post.");
                }
            }
        }
        $post = $this->model->getById($id);
        $this->users = (new UsersModel())->getUsers();
        if (!$post) {
            $this->addErrorMessage("Post does not exist.");
            $this->redirect("posts");
        }
        $this->post = $post;
    }
}