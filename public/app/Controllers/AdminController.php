<?php


namespace App\Controllers;
use App\Core\System;

class AdminController {

    protected $indexTemplate;
    protected $menuActive;
    protected $errors = [];
    protected $name;

    public function __construct () {
        $this->indexTemplate = 'index';
        if (!isset($_SESSION['user'])) {
            header('Location: /admin/auth/login');
        }
    }

    public function index () {
//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($this->indexTemplate), []);
        $sideBar = System::buildTemplate($this->getTemplateName('side-bar'), []);

//        render the main template using content of the page
        $html = System::buildTemplate($this->getTemplateName('main'), [
            'pageContent' => $pageContent,
            'sideBar' => $sideBar
        ]);

        return $html;
    }

    protected function getTemplateName ($name) {
        return 'Admin/' . $name . '.php';
    }

    protected function setSettings () {
        $this->menuActive[$this->name] = 'active';
        $this->indexTemplate = $this->name . '-index';

        $this->sideBar = System::buildTemplate($this->getTemplateName('side-bar'), [
            'msg' => $_SESSION['msg'] ?? '',
            'errors' => $_SESSION['errors'] ?? '',
            'menuActive' => $this->menuActive,
        ]);
        unset($_SESSION['msg']);
        unset($_SESSION['errors']);
    }
}