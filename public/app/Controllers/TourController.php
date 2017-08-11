<?php


namespace App\Controllers;
use App\Core\System;
use App\Core\Traits\ResourceController;
use App\Models\Tour;

class TourController extends AdminController {

    use ResourceController;

    protected $sideBar;
    protected $model;
    protected $name = 'tour';

    public function __construct () {
        parent::__construct();
        $this->setSettings();

        $this->model = Tour::getInstance();
    }

    protected function manageFormData () {
        $request = [];

        if (count($_POST) > 0) {
            foreach ($_POST as $key => $value) {
                $request[$key] = htmlspecialchars($value);
            }

            $request['is_available'] = $_POST['is_available'] ?? 0;
            unset($request['button']);
        }

        return $request;
    }

    protected function validate ($request) {

        if (empty($request['venue'])) {
            array_push($this->errors, 'Field "venue" cannot be empty');
        }
        if (empty($request['city'])) {
            array_push($this->errors, 'Field "city" cannot be empty');
        }
        if (empty($request['date'])) {
            array_push($this->errors, 'Field "date" cannot be empty');
        }

        return (empty($this->errors)) ? true : false;
    }
}