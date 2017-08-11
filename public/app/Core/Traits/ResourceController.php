<?php


namespace App\Core\Traits;
use App\Core\System;

trait ResourceController {

    public function index () {

        $list = $this->model->getAll();

        return $this->getPageTemplate($this->indexTemplate, [
            'list' => $list
        ]);
    }

    public function create ($parameters = []) {

        return $this->getPageTemplate($this->name . '-one', [
            'method' => 'store/',
            'param' => $parameters
        ]);
    }

    public function store () {

        $request = $this->manageFormData();

        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/create");
        }

        if ($_POST['button'] == 'save') {
            $this->model->add($request);
            $_SESSION['msg'] = 'New record was added';
        }

        return header("Location: /admin/{$this->name}/index");
    }

    public function edit ($id, $parameters = []) {

        $data = $this->model->getByID($id);

        return $this->getPageTemplate($this->name . '-one', [
            'method' => 'update/' . $id,
            'data' => $data,
            'param' => $parameters
        ]);
    }

    public function update ($id) {

        $request = $this->manageFormData();

        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/edit/{$id}");
        }

        if ($_POST['button'] == 'save') {
            $this->model->updateByID($id, $request);
            $_SESSION['msg'] = 'The record was updated';
        }

        return header("Location: /admin/{$this->name}/index");
    }

    public function delete ($id) {
        $this->model->deleteByID($id);

        $_SESSION['msg'] = 'The record was deleted';
        return header("Location: /admin/{$this->name}/index");
    }

    protected function getPageTemplate ($template, $data = []) {

//        get html code for the page content container
        $pageContent = System::buildTemplate($this->getTemplateName($template), $data);

//        render the main template using content of the page
        return System::buildTemplate($this->getTemplateName('main'), [
            'pageContent' => $pageContent,
            'sideBar' => $this->sideBar
        ]);
    }

    //  should return $request array with form data
    protected abstract function manageFormData ();

    protected abstract function validate ($request);
}