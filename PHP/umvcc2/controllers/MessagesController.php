<?php

class MessagesController extends BaseController
{
    public function onInit()
    {
        $this->authorize();
    }

    public function index() {
        // TODO: Select only user friends
        $this->users = (new UsersModel())->getUsers($_SESSION['user_id']);

        if ($this->isPost) {
            $friendId = $_POST['user-id'];
            $_SESSION['friend_id'] = $friendId;
            $this->redirect('messages', 'chat');
        }
    }

    public function chat($userId = null) {
        if (!isset($_SESSION['friend_id']) && !$userId) {
            $this->addErrorMessage('You have to select friend id first.');
            $this->redirect('messages');
        }

        if (!$userId) {
            $userId = $_SESSION['friend_id'];
        }

        $this->friend = (new UsersModel())->getUserById($userId);
        $this->messages = $this->model->getMessages($_SESSION['user_id'], $userId);

        if ($this->isPost) {
            $message = $_POST['message'];
            $friendId = $_SESSION['friend_id'];
            $userId = $_SESSION['user_id'];
            if (!$this->model->sendMessage($userId, $friendId, $message)) {
                $this->addErrorMessage('Message cound not be send.');
            } else {
                $this->redirect('messages', 'chat');
            }
        }
    }
}

?>