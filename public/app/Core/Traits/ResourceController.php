<?php


namespace App\Core\Traits;
use App\Core\System;

/**
 * Trait ResourceController
 *
 * this trait contains standard method to add, update and delete data in particular database table
 *
 * @package App\Core\Traits
 */
trait ResourceController {

    public function index () {

        //  get all data from table
        $list = $this->model->getAll();

        //  render template with this data
        return $this->getPageTemplate($this->indexTemplate, [
            'list' => $list
        ]);
    }

    public function create ($parameters = []) {

        //  render template for creating a new record in DB
        return $this->getPageTemplate($this->name . '-one', [
            'method' => 'store/',
            'param' => $parameters
        ]);
    }

    public function store () {

        //  get request data
        $request = $this->manageFormData();

        //  validate request and send user back if there is any errors
        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/create");
        }

        //  store data into database
        if ($_POST['button'] == 'save') {
            $this->model->add($request);
            $_SESSION['msg'] = 'New record was added';
        }

        return header("Location: /admin/{$this->name}/index");
    }

    public function edit ($id, $parameters = []) {

        //  retrieve record from DB by its id
        $data = $this->model->getByID($id);

        //  render template for updating the record
        return $this->getPageTemplate($this->name . '-one', [
            'method' => 'update/' . $id,
            'data' => $data,
            'param' => $parameters
        ]);
    }

    public function update ($id) {

        //  get request data
        $request = $this->manageFormData();

        //  validate request and send user back if there is any errors
        if (!$this->validate($request)) {
            $_SESSION['errors'] = $this->errors;
            return header("Location: /admin/{$this->name}/edit/{$id}");
        }

        //  update data in database
        if ($_POST['button'] == 'save') {
            $this->model->updateByID($id, $request);
            $_SESSION['msg'] = 'The record was updated';
        }

        return header("Location: /admin/{$this->name}/index");
    }

    public function delete ($id) {

        //  delete DB record
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

    /*
     * the following abstract methods should be redefine in classes implemented this trait
     */

    /**
     * @return array $request
     */
    protected abstract function manageFormData ();

    /**
     *
     * should validate the request against some rules and return true/false result
     *
     * @param $request
     *
     * @return boolean
     */
    protected abstract function validate ($request);
}