<?php


namespace App;


use App\Controllers\ClientController;
use App\Controllers\AdminController;

class App {



    public function __construct () {
    }

    public function run () {
        $queryArray = explode('/', $_GET['querystring']);
        $routeName = str_replace('/', '.', $_GET['querystring']);

        if ($queryArray[0] !== 'admin') {
            $name = $this->makeControllerName('client');
            $method = 'render';
            $parameters = $queryArray[0];
        } else {
            if (!isset($queryArray[1])) {
                //  admin route mask 'admin/tour/update/2
                //  admin route mask 'admin/{controller}/{method}/{parameters}
                $name = $this->makeControllerName('admin');
                $method = 'index';
                $parameters = [];
            } else {
                $name = $this->makeControllerName($queryArray[1]);
                $method = $queryArray[2] ?? '';
                $parameters = $queryArray[3] ?? [];
            }
        }



        try {
            $controller = new $name($parameters);

            if (!method_exists($controller, $method)) {
                throw new \Exception('Page not found');
            }

            return $controller->$method($parameters);

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    private function makeControllerName ($name) {
        return "App\Controllers\\" . ucfirst($name) . 'Controller';
    }
}