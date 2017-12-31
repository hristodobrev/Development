<?php

class PostsController extends BaseController
{
    function onInit()
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
            $title = $_POST['post_title'];
            if (strlen($title) < 1) {
                $this->setValidationError("post_title", "Title cannot be empty.");
            }

            $content = $_POST['post_content'];
            if (strlen($content) < 1) {
                $this->setValidationError("post_content", "Content cannot be empty.");
            }

            if ($this->formValid()) {
                $userId = $_SESSION['user_id'];
                if ($this->model->create($title, $content, $userId)) {
                    $this->addInfoMessage("Post created successfully.");
                    $this->redirect("posts");
                } else {
                    $this->addErrorMessage("Error: Failed to create a post.");
                }
            }
        }
    }

    public function edit(int $id)
    {
        if ($this->isPost) {
            $title = $_POST['post_title'];
            if (strlen($title) < 1) {
                $this->setValidationError("post_title", "Title cannot be empty!");
            }

            $content = $_POST['post_content'];
            if (strlen($content) < 1) {
                $this->setValidationError("post_content", "Content cannot be empty!");
            }

            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if (!preg_match($dateRegex, $date)) {
                $this->setValidationError("post_date", "Invalid date!");
            }

            $user_id = $_POST['user_id'];
            if ($user_id < 1 || $user_id > 1000000) {
                $this->setValidationError("user_id", "Invalid author user ID!");
            }

            if ($this->formValid()) {
                if($this->model->edit($id, $title, $content, $date, $user_id)){
                    $this->addInfoMessage("Post edited successfully.");
                } else {
                    $this->addErrorMessage("Error: Failed to edit post.");
                }

                $this->redirect("posts");
            }
        }

        $post = $this->model->getById($id);
        if (!$post) {
            $this->addErrorMessage("Error: Post does not exist.");
            $this->redirect("posts");
        }

        $this->users = $this->model->getUsers();
        $this->post = $post;
    }

    public function delete(int $id)
    {
        if ($this->isPost) {
            if ($this->model->delete($id)){
                $this->addInfoMessage("Post deleted.");
            } else {
                $this->addErrorMessage("Error: Post cannot be deleted.");
            }

            $this->redirect("posts");
        } else {
            $post = $this->model->getById($id);
            if (!$post) {
                $this->addErrorMessage("Error: Post does not exist.");
                $this->redirect("posts");
            }

            $this->users = $this->model->getUsers();
            $this->post = $post;
        }
    }
}