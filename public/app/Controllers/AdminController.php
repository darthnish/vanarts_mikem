<?php


namespace App\Controllers;


class AdminController {

    protected $page;

    public function __construct () {
    }

    public function index () {
        return $_SERVER['REQUEST_METHOD'];
    }
}