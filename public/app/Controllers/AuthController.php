<?php


namespace App\Controllers;
use App\Core\System;


class AuthController {

    public function login () {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

//        get html code for the page content container
            $pageContent = System::buildTemplate($this->getTemplateName('login-form'), [
                'authError' => $_SESSION['authError'] ?? ''
            ]);

//        render the main template using content of the page
            $html = System::buildTemplate($this->getTemplateName('main'), [
                'pageContent' => $pageContent,
            ]);

            return $html;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username === 'admin' && $password === 'vanarts') {
                $_SESSION['user'] = $username;
                header('Location: /admin');
            } else {
                $_SESSION['authError'] = 'Incorrect login/password';
                header('Location: /admin/auth/login');
            }
        }
    }

    public function logout () {
        unset($_SESSION['user']);
        header('Location: /admin/auth/login');
    }

    protected function getTemplateName ($name) {
        return 'Admin/' . $name . '.php';
    }
}