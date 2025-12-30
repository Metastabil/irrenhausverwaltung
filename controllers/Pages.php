<?php
namespace App\Controllers;

use JetBrains\PhpStorm\NoReturn;
use App\Models\UserModel;

class Pages extends BaseController {
    private UserModel $user_model;

    public function __construct() {
        parent::__construct();

        $this->user_model = new UserModel();
    }

    public function login() :void {
        $data = [
            'title' => esc(LANG->pages->titles->login)
        ];

        $required_fields = [
            'email',
            'password'
        ];

        if ($this->request->is('post') && $this->request->validate($required_fields)) {
            $email = esc($this->request->get('email'));
            $password = $this->request->get('password');
            $user = $this->user_model->select(0, $email);

            if (!empty($user) && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name']
                ];

                set_message(esc(LANG->messages->success->login));

                redirect('users');
            }

            set_message(esc(LANG->messages->error->login), 'error');

            redirect('login');
        }

        $this->view->render('pages/login', $data);
    }

    #[NoReturn]
    public function logout() :void {
        unset($_SESSION['user']);

        redirect('login');
    }
}
