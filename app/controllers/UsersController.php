<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    /**
     * Retrieve all users from the database via UsersModel
     * and pass them to the view for display.
     */
    public function index()
    {
        $this->call->database();
        $this->call->model('UsersModel');

        $data['users'] = array_map(static function (array $user): array {
            $user['firstname'] = (string) ($user['firstname'] ?? '');
            $user['lastname'] = (string) ($user['lastname'] ?? '');
            $user['email'] = (string) ($user['email'] ?? '');
            $user['username'] = (string) ($user['username'] ?? '');
            $user['id'] = (string) ($user['id'] ?? '');

            return $user;
        }, $this->UsersModel->all());

        $this->call->view('users_view', $data);
    }
}
