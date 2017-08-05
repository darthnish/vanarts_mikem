<?php


namespace App\Controllers;


class TourController extends AdminController {

    public function __construct () {
        parent::__construct();
        $this->indexTemplate = 'tour-index';
    }

}