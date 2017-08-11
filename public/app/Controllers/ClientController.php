<?php


namespace App\Controllers;
use App\Core\System;

class ClientController {

    protected $page;
    protected $settings;

    public function __construct ($page) {
        $this->settings = include_once '../config/pages.php';
        $page = (empty($page)) ? 'home' : $page;
        $this->page = (!in_array($page, array_keys($this->settings))) ? 'error' : $page;
    }

    public function render () {

//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($this->page), []);

//        render the main template using content of the page
        $html = System::buildTemplate($this->getTemplateName('main'), [
            'pageInfo' => $this->settings[$this->page],
            'navActive' => [$this->page => 'active'],
            'menu' => array_diff(array_keys($this->settings), ['error']),
            'pageContent' => $pageContent,
        ]);

        return $html;
    }

    private function getTemplateName ($name) {
        return 'Client/' . $name . '.php';
    }
}