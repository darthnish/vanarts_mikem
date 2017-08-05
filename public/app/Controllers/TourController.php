<?php


namespace App\Controllers;
use App\Core\System;
use App\Models\Tour;

class TourController extends AdminController {

    private $sideBar;
    private $errors = [];

    public function __construct () {
        parent::__construct();
        $this->indexTemplate = 'tour-index';
        $this->sideBar = System::buildTemplate($this->getTemplateName('side-bar'), [
            'msg' => $_SESSION['msg'] ?? ''
        ]);

        unset($_SESSION['msg']);
    }

    public function index () {
        $tourInfo = Tour::getInstance()->getAll();

//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($this->indexTemplate), [
            'tourInfo' => $tourInfo
        ]);

//        render the main template using content of the page
        $html = System::buildTemplate($this->getTemplateName('main'), [
            'pageContent' => $pageContent,
            'sideBar' => $this->sideBar,
        ]);

        return $html;
    }

    public function create () {
//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName('tour-one'), []);

//        render the main template using content of the page
        $html = System::buildTemplate($this->getTemplateName('main'), [
            'pageContent' => $pageContent,
            'sideBar' => $this->sideBar
        ]);

        return $html;
    }

    public function store () {

        $request = [];

        if (count($_POST) > 0) {
            foreach ($_POST as $key => $value) {
                $request[$key] = htmlspecialchars($value);
            }
        }

        Tour::getInstance()->add([
            'date' => $request['date'],
            'venue' => $request['venue'],
            'city' => $request['city'],
            'is_available' => (int) $request['is_available'],
        ]);

        $_SESSION['msg'] = 'Tour date was added';
        return header('Location: /admin/tour/index');
    }
}