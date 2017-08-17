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

        //  save the model instance into the class property
        $this->model = Image::getInstance();
    }

    /**
     * store image in database
     */
    public function store () {

        //  get request data
        $request = $this->manageFormData();

        //  validate request and send user back if there is any errors
        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/create");
        }

        //  store data into database
        //      and move uploaded file to the img directory
        if ($_POST['button'] == 'save') {
            $this->model->add($request);

            $targetDir = 'img/uploads/';
            $targetFile = $targetDir . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);

            $_SESSION['msg'] = 'New record was added';
        }

        //  send user to image index page
        return header("Location: /admin/{$this->name}/index");
    }

    protected function manageFormData () {
        //  save file info to request variable
        $request['path'] = $_FILES['file']['name'];

        return $request;
    }

    /**
     * function for request validation
     *
     * @param $request
     *
     * @return bool
     */
    protected function validate ($request) {

        //  array with allowed extension
        $allowedExt = ['jpg', 'jpeg', 'png'];

        //  target directory
        $targetDir = '/img/uploads/';
        $targetFile = $targetDir . basename($_FILES['file']['name']);

        //  file extension
        $ext = pathinfo($targetFile, PATHINFO_EXTENSION);

        //  validation rules
        //      - if the file is an image
        //      - if the file already exists
        //      - if the file is smaller than 4 Mb
        //      - if the file has proper extension

        $isImage = (boolean)getimagesize($_FILES['file']['tmp_name']);
        $isExist = file_exists($targetFile);
        $hasCorrectSize = ($_FILES['file']['size'] < 1000 * 1000 * 4) ? true : false;
        $hasCorrectExt = in_array($ext, $allowedExt);

        //  push error messages into the array if there is any
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

        //  return result
        return (empty($this->errors)) ? true : false;
    }
}