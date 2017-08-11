<?php


namespace App\Controllers;
use App\Core\System;
use App\Core\Traits\ResourceController;
use App\Models\User;

class UsersController extends AdminController {

    use ResourceController;

    protected $sideBar;
    protected $model;
    protected $name = 'users';

    public function __construct () {
        parent::__construct();
        $this->setSettings();

        $this->model = User::getInstance();
    }

    protected function manageFormData () {
        $request['password'] = $_POST['password'];

        return $request;
    }

    protected function validate ($request) {

        if (empty($request['password'])) {
            array_push($this->errors, 'Field "password" cannot be empty');
        }
        if (empty($_POST['rPassword'])) {
            array_push($this->errors, 'Field "repeat password" cannot be empty');
        }
        if ($request['password'] != $_POST['rPassword']) {
            array_push($this->errors, 'Passwords are not the same');
        }

        return (empty($this->errors)) ? true : false;
    }
}