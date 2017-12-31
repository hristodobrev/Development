<?php

namespace Controllers;

use DTO\ProfileEditViewModel;
use DTO\UserViewModel;
use ViewEngine\ViewInterface;

class UserController
{
    public function view(string $firstName, string $lastName, ViewInterface $view)
    {
        $viewModel = new UserViewModel($firstName, $lastName);
        $view->render($viewModel);
    }

    public function edit($id, ProfileEditViewModel $model, ViewInterface $view)
    {
        $viewModel = new ProfileEditViewModel(
            $id,
            $model->getUsername(),
            $model->getPassword(),
            $model->getEmail(),
            $model->getBirthday()
        );
        
        $view->render($viewModel);
    }
}