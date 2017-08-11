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

        $this->model = News::getInstance();
    }

    public function create () {
        $images = Image::getInstance()->getAll();

        return $this->defaultCreate(['images' => $images]);
    }

    public function edit ($id) {
        $images = Image::getInstance()->getAll();

        return $this->defaultEdit($id, ['images' => $images]);
    }

    protected function manageFormData () {
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