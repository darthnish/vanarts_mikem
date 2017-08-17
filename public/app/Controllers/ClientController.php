<?php


namespace App\Controllers;
use App\Core\System;
use App\Models\News;
use App\Models\Tour;

class ClientController {

    protected $page;
    protected $settings;

    public function __construct ($page) {
        //  get page list from config file and save it to the variable
        $this->settings = include_once '../config/pages.php';

        //  define the page name
        $page = (empty($page)) ? 'home' : $page;
        $this->page = (!in_array($page, array_keys($this->settings))) ? 'error' : $page;
    }

    public function render () {

        //  check if user submit the contact form
        if ($this->page == 'contact' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            //  then send email to him and redirect to home page
            $this->sendEmail();
            return header("Location: /");
        }

        //  get data needed for the page from database tables
        $data = $this->getData($this->page);

        //  get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($this->page), [
            'data' => $data ?? ''
        ]);

        //  render the main template using content of the page, menu and page info from config file
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

    private function getData ($page) {
        // retrieve necessary data for tour and news pages from database
        switch ($page) {
            case 'tour':
                return Tour::getInstance()->getAll();
                break;
            case 'news':
                return News::getInstance()->getAll();
                break;
            default:
                return [];
        }
    }

    private function sendEmail () {
        //  send email to user

        //  create variables for necessary email fields
        $to = $_POST['email'];
        $subject = $_POST['subject'];
        $message = System::buildTemplate($this->getTemplateName('email'), [
            'message' => $_POST['message'],
            'name' => $_POST['name'],
        ]);

        //  set headers of the email response
        $headers = "From: tom@ohhhh.me" . PHP_EOL;
        $headers .= "MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;

        mail($to, $subject, $message, $headers);
    }
}