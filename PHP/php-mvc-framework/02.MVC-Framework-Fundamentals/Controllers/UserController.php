<?php

namespace Controllers;

use Models\View\ProfileEditViewModel;
use Models\View\UserViewModel;
use ViewEngine\ViewInterface;

class UserController
{
    public function hello($firstName, $lastName, ViewInterface $view)
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