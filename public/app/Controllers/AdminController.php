<?php


namespace App\Controllers;
use App\Core\System;

class AdminController {

    protected $indexTemplate;
    protected $menuActive;
    protected $errors = [];
    protected $name;

    public function __construct () {
        //  define the name of template that will be rendered
        $this->indexTemplate = 'index';

        //  check if user is logged in (user has a session)
        //  if not, send him to login page
        if (!isset($_SESSION['user'])) {
            header('Location: /admin/auth/login');
        }
    }

    public function index () {
        //  get html code for the page content container
        //      add error message from session if needed
        $pageContent = System::buildTemplate($this->getTemplateName($this->indexTemplate), [
            'error' => $_SESSION['exception'] ?? ''
        ]);
        unset($_SESSION['exception']);

        //  render the sidebar of admin panel
        $sideBar = System::buildTemplate($this->getTemplateName('side-bar'), []);

        //  render the main template using content of the page and sidebar
        $html = System::buildTemplate($this->getTemplateName('main'), [
            'pageContent' => $pageContent,
            'sideBar' => $sideBar
        ]);

        //  return the resulting html code
        return $html;
    }

    protected function getTemplateName ($name) {
        return 'Admin/' . $name . '.php';
    }

    protected function setSettings () {
        //  set default settings for all child controllers (this function will be invoked in their constructors

        //  define the active menu item and index template name
        $this->menuActive[$this->name] = 'active';
        $this->indexTemplate = $this->name . '-index';

        //  render the sidebar of admin panel with messages
        $this->sideBar = System::buildTemplate($this->getTemplateName('side-bar'), [
            'msg' => $_SESSION['msg'] ?? '',
            'errors' => $_SESSION['errors'] ?? '',
            'menuActive' => $this->menuActive,
        ]);
        unset($_SESSION['msg']);
        unset($_SESSION['errors']);
    }
}