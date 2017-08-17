<?php


namespace App\Controllers;
use App\Core\System;
use App\Models\User;


class AuthController {

    public function login () {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //  if page is requested by GET method

            //  get html code for the page content container
            $pageContent = System::buildTemplate($this->getTemplateName('login-form'), [
                'authError' => $_SESSION['authError'] ?? ''
            ]);

            //  render the main template using content of the page and sidebar
            $html = System::buildTemplate($this->getTemplateName('main'), [
                'pageContent' => $pageContent,
            ]);

            return $html;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //  if page is requested by POST method

            //  get username and password from the form
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            //  check if there is such row in uesr table
            $isAuth = (boolean) User::getInstance()->find($username, $password);

            if ($isAuth) {
                //  if yes, open session for user and send him to index admin page
                $_SESSION['user'] = $username;
                header('Location: /admin');
            } else {
                //  ... if not, put error to session and send user back to the page
                $_SESSION['authError'] = 'Incorrect login/password';
                header('Location: /admin/auth/login');
            }
        }
    }

    public function logout () {
        //  delete user's session
        unset($_SESSION['user']);
        header('Location: /admin/auth/login');
    }

    protected function getTemplateName ($name) {
        return 'Admin/' . $name . '.php';
    }
}