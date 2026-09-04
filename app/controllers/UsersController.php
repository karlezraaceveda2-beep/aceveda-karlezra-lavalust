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
        $data = [
            'users' => [],
            'error' => null,
        ];

        $has_database_config = getenv('DB_HOST') && getenv('DB_NAME') &&
            (getenv('DB_USERNAME') || getenv('DB_USER'));

        if ($has_database_config) {
            $this->call->database();
            $this->UsersModel = $this->call->model('UsersModel');
            $data['users'] = $this->UsersModel->all() ?: [];
        } else {
            $data['error'] = 'User data is unavailable because the database is not configured.';
        }

        $this->call->view('users_view', $data);
    }
    
}
