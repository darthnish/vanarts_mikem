<?php


namespace App;

use App\Controllers\ClientController;
use App\Controllers\AdminController;

class App {

    public function run () {
        //  save get parameters from URI in array and as a route name
        $queryArray = explode('/', $_GET['querystring']);
        $routeName = str_replace('/', '.', $_GET['querystring']);

        if ($queryArray[0] !== 'admin') {
            //  for client side (not-admin)
            //      - we will call ClientController
            //      - method render() of it
            //      - with parameters from URI (mostly - name of the page)
            $name = $this->makeControllerName('client');
            $method = 'render';
            $parameters = $queryArray[0];
        } else {
            //  for admin side
            //      - we will use the following route mask - 'admin/{controller}/{method}/{parameters}'
            //          (e.g 'admin/tour/update/2')
            //      - as method we will use second URI parameters; if it is not specified, then use index method
            //      - we will grab parameters for method from URI as well
            if (!isset($queryArray[1])) {
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
            //  try to initiate a new controller and run its method if it exists
            //  return the result
            $controller = new $name($parameters);

            if (!method_exists($controller, $method)) {
                throw new \Exception('Page not found');
            }

            return $controller->$method($parameters);

        } catch (\Exception $e) {

            //  if method doesn't exist, store the error message in session and send user to the index admin page
            $_SESSION['exception'] = $e->getMessage();
            return header("Location: /admin");
        }
    }

    private function makeControllerName ($name) {
        //  return the full path to the controller file
        return "App\Controllers\\" . ucfirst($name) . 'Controller';
    }
}