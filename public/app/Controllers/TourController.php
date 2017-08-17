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

        //  save the model instance into the class property
        $this->model = Tour::getInstance();
    }

    protected function manageFormData () {
        //  obtain form data from POST-request
        //  convert html-tag to html-entities for better security
        //  manually create 'is_available' key in request array, since POST-array might not have it if it is not checked in form field
        //  delete the button key from request (we don't want to put it in DB

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

        //  push error message to the array if request data doesn't meet the validation rules
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