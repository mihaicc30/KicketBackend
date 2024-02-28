<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            $data = ["user" => $user, "success" => true];
            unset($user['password']);
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON(['error' => 'Invalid email or password']);
        }
    }
}
