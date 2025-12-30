<?php
namespace App\Controllers;

use JetBrains\PhpStorm\NoReturn;
use App\Models\UserModel;

class Users extends BaseController {
    private UserModel $user_model;

    public function __construct() {
        parent::__construct();

        redirect_if_not_authenticated();

        $this->user_model = new UserModel();
    }

    public function index() :void {
        $elements = $this->user_model->select();
        $filtered_elements = [];
        $search = '';

        if ($this->request->is('post')) {
            $search = $this->request->get('search');

            if (!empty($search)) {
                foreach ($elements as $e) {
                    if (str_contains(strtolower($e['first_name']), strtolower($search)) ||
                        str_contains(strtolower($e['last_name']), strtolower($search)) ||
                        str_contains(strtolower($e['email']), strtolower($search))) {
                        $filtered_elements[] = $e;
                    }
                }
            }
        }

        $data = [
            'title' => LANG->users->titles->index,
            'elements' => empty($filtered_elements) && empty($search) ? $elements : $filtered_elements,
            'search' => $search
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/index', $data)
                   ->render('templates/footer');
    }

    public function create() :void {
        $data = [
            'title' => LANG->users->titles->create
        ];

        $required_fields = [
            'first-name',
            'last-name',
            'email',
            'password'
        ];

        if ($this->request->is('post') && $this->request->validate($required_fields)) {
            $input = [
                'first_name' => esc($this->request->get('first-name')),
                'last_name' => esc($this->request->get('last-name')),
                'email' => esc($this->request->get('email')),
                'password' => password_hash($this->request->get('password'), PASSWORD_DEFAULT)
            ];

            $response = $this->user_model->insert($input);

            if ($response > 0) {
                set_message(LANG->messages->success->save);
            }
            else {
                set_message(LANG->messages->error->save, 'error');
            }

            redirect('users');
        }

        $this->view->render('templates/header', $data)
                   ->render('users/create', $data)
                   ->render('templates/footer');
    }

    public function show(int $id) :void {
        $data = [
            'title' => LANG->users->titles->show,
            'element' => $this->user_model->select($id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/show', $data)
                   ->render('templates/footer');
    }

    public function update(int $id) :void {
        $data = [
            'title' => LANG->users->titles->edit,
            'element' => $this->user_model->select($id)
        ];

        $required_fields = [
            'first-name',
            'last-name',
            'email'
        ];

        if ($this->request->is('post') && $this->request->validate($required_fields)) {
            $input = [
                'id' => $id,
                'first_name' => esc($this->request->get('first-name')),
                'last_name' => esc($this->request->get('last-name')),
                'email' => esc($this->request->get('email')),
                'deleted' => 0
            ];

            if (!empty($this->request->get('password'))) {
                $input['password'] = password_hash($this->request->get('password'), PASSWORD_DEFAULT);
            }
            else {
                $input['password'] = $data['element']['password'];
            }

            if ($this->user_model->update($input)) {
                set_message(LANG->messages->success->save);
            }
            else {
                set_message(LANG->messages->error->save, 'error');
            }

            redirect('users');
        }

        $this->view->render('templates/header', $data)
                   ->render('users/update', $data)
                   ->render('templates/footer');
    }

    #[NoReturn]
    public function delete(int $id) :void {
        $element = $this->user_model->select($id);
        $input = [
            'id' => $id,
            'first_name' => esc($element['first_name']),
            'last_name' => esc($element['last_name']),
            'email' => esc($element['email']),
            'password' => $element['password'],
            'deleted' => 1
        ];

        if ($this->user_model->update($input)) {
            set_message(LANG->messages->success->delete);
        }
        else {
            set_message(LANG->messages->error->delete, 'error');
        }

        redirect('users');
    }
}
