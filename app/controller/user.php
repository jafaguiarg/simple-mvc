<?php

class User extends Controller
{

    /**
     * @param string $name
     */
    public function register($name = '')
    {
        $this->model('UserModel');

        $user = new UserModel();
        $user->setName($name);

        $response = ['name' => $user->getName()];

        $this->view('user/inserted', $response);

    }

}

