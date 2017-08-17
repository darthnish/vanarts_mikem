<?php


namespace App\Controllers;
use App\Core\System;
use App\Core\Traits\ResourceController;
use App\Models\Image;
use App\Models\News;

class NewsController extends AdminController {

    use ResourceController {
        create as defaultCreate;
        edit as defaultEdit;
    }

    protected $sideBar;
    protected $model;
    protected $name = 'news';

    public function __construct () {
        parent::__construct();
        $this->setSettings();

        //  save the model instance into the class property
        $this->model = News::getInstance();
    }

    public function create () {
        //  pull list of all images from DB
        $images = Image::getInstance()->getAll();

        //  pass this data to default method of resource controller
        return $this->defaultCreate(['images' => $images]);
    }

    public function edit ($id) {
        //  pull list of all images from DB
        $images = Image::getInstance()->getAll();

        //  pass this data to default method of resource controller
        return $this->defaultEdit($id, ['images' => $images]);
    }

    protected function manageFormData () {
        //  obtain form data from POST-request
        //  convert html-tag to html-entities for better security
        //  delete the button key from request (we don't want to put it in DB
        $request = [];

        if (count($_POST) > 0) {
            foreach ($_POST as $key => $value) {
                $request[$key] = htmlspecialchars($value);
            }

            unset($request['button']);
        }

        return $request;
    }

    protected function validate ($request) {

        //  push error message to the array if request data doesn't meet the validation rules
        if (empty($request['body'])) {
            array_push($this->errors, 'Field "body" cannot be empty');
        }
        if (empty($request['footer'])) {
            array_push($this->errors, 'Field "footer" cannot be empty');
        }
        if (empty($request['date'])) {
            array_push($this->errors, 'Field "date" cannot be empty');
        }
        if (empty($request['image_id'])) {
            array_push($this->errors, 'Field "image" cannot be empty');
        }

        return (empty($this->errors)) ? true : false;
    }
}