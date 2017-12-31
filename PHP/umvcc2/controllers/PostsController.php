<?php

class PostsController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    public function index()
    {
        $this->posts = $this->model->getUserPosts($_SESSION['user_id']);
    }

    public function userPosts(int $userId)
    {
        $this->posts = $this->model->getUserPosts($userId);
        $this->user = (new UsersModel())->getUserById($userId);
        if (!$this->user) {
            $this->addErrorMessage('User does not exist.');
            $this->redirect('');
        }
    }

    public function edit($postId = null)
    {
        if (!$postId) {
            $this->addErrorMessage("You must specify which post you want to edit.");
            $this->redirect('posts');
        }

        $this->post = $this->model->getPostById($postId);
        if (!$this->post) {
            $this->addErrorMessage('Post does not exist.');
            $this->redirect('posts');
        }

        if ($this->post['author_id'] != $_SESSION['user_id']) {
            $this->addErrorMessage('You can edit only your own posts.');
            $this->redirect('posts');
        }

        if ($this->isPost) {
            $title = $_POST['title'];
            if (strlen($title) < 10) {
                $this->setValidationError('title', 'Title must have at least 10 characters.');
            }

            $content = $_POST['content'];
            if (strlen($content) < 1) {
                $this->setValidationError('content', 'Content must not be empty.');
            }

            if ($this->formValid()) {
                if ($this->model->edit($postId, $title, $content)) {
                    $this->addSuccessMessage('Successfully edited post.');
                } else {
                    $this->addErrorMessage('Failed to edit post.');
                }

                $this->redirect('');
            }
        }
    }

    public function create() {
        if ($this->isPost) {
            $img = $_FILES['image']['name'];

            if ($img) {
                $target_dir = 'content/images/';
                $target_file = $target_dir . basename($img);
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                if(!$check || ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif")) {
                    $this->setValidationError('image', 'Unknown image type.');
                }

                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $this->addErrorMessage('Failed to load image.');
                }
            } else {
                $img = null;
            }

            $title = $_POST['title'];
            if (strlen($title) < 10) {
                $this->setValidationError('title', 'Title must have at least 10 characters.');
            }

            $content = $_POST['content'];
            if (strlen($content) < 1) {
                $this->setValidationError('content', 'Content must not be empty.');
            }

            $authorId = $_SESSION['user_id'];
            if ($this->formValid()) {
                if ($this->model->create($img, $title, $content, $authorId)) {
                    $this->addSuccessMessage('Successfully created post.');
                } else {
                    $this->addErrorMessage('Failed to create post.');
                }

                $this->redirect('');
            }
        }
    }

    public function delete(int $postId)
    {
        $this->post = $this->model->getPostById($postId);

        if ($this->isPost) {
            if ($this->model->delete($postId)) {
                $this->addInfoMessage('Post deleted.');
                $this->redirect('posts');
            } else {
                $this->addErrorMessage('Delete post failed.');
            }
        }
    }
}

?>