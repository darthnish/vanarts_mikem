<?php


namespace App\Controllers;
use App\Core\System;
use App\Core\Traits\ResourceController;
use App\Models\Image;

class ImagesController extends AdminController {

    use ResourceController;

    protected $sideBar;
    protected $model;
    protected $name = 'images';

    public function __construct () {
        parent::__construct();
        $this->setSettings();

        $this->model = Image::getInstance();
    }

    public function store () {

        $request = $this->manageFormData();

        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/create");
        }

        if ($_POST['button'] == 'save') {
            $this->model->add($request);

            $targetDir = 'img/uploads/';
            $targetFile = $targetDir . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);

            $_SESSION['msg'] = 'New record was added';
        }

        return header("Location: /admin/{$this->name}/index");
    }

    protected function manageFormData () {

        $request['path'] = $_FILES['file']['name'];

        return $request;
    }

    protected function validate ($request) {

        $allowedExt = ['jpg', 'jpeg', 'png'];

        $targetDir = '/img/uploads/';
        $targetFile = $targetDir . basename($_FILES['file']['name']);

        $ext = pathinfo($targetFile, PATHINFO_EXTENSION);

        $isImage = (boolean)getimagesize($_FILES['file']['tmp_name']);
        $isExist = file_exists($targetFile);
        $hasCorrectSize = ($_FILES['file']['size'] < 1000 * 1000 * 4) ? true : false;
        $hasCorrectExt = in_array($ext, $allowedExt);

        if (!$isImage) {
            array_push($this->errors, 'File is not an image');
        }
        if ($isExist) {
            array_push($this->errors, 'File already exists');
        }
        if (!$hasCorrectSize) {
            array_push($this->errors, 'File size is more than 4 Mb');
        }
        if (!$hasCorrectExt) {
            array_push($this->errors, 'File extension is prohibited');
        }

        return (empty($this->errors)) ? true : false;
    }
}