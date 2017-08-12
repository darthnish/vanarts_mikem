<?php


namespace App\Controllers;
use App\Core\System;
use App\Models\News;
use App\Models\Tour;

class ClientController {

    protected $page;
    protected $settings;

    public function __construct ($page) {
        $this->settings = include_once '../config/pages.php';
        $page = (empty($page)) ? 'home' : $page;
        $this->page = (!in_array($page, array_keys($this->settings))) ? 'error' : $page;
    }

    public function render () {

        if ($this->page == 'contact' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sendEmail();
            return header("Location: /");
        }

        $data = $this->getData($this->page);

//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($this->page), [
            'data' => $data ?? ''
        ]);

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

    private function getData ($page) {
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
        $to = $_POST['email'];
        $subject = $_POST['subject'];
        $message = System::buildTemplate($this->getTemplateName('email'), [
            'message' => $_POST['message'],
            'name' => $_POST['name'],
        ]);
        $headers = "From: tom@ohhhh.me \r\n";
        $headers .= "MIME-Version: 1.0\r\r";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";

        $didItSend = mail($to, $subject, $message, $headers);
//        if ($didItSend) {
//            echo "Email sent successfully";
//        } else {
//            echo "Email FAILED";
//        }
    }
}