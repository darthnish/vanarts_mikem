<?php


namespace App\Controllers;


class TourController {

    protected $page;

    public function __construct () {
    }

    public function render () {
        return $_SERVER['REQUEST_METHOD'];
    }
}