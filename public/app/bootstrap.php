<?php

session_start();

//  register class autoloader that will automatically include all classes used in application
spl_autoload_register(function($classname) {

    //  get the path to the class file
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';

    try {
        if (!file_exists($path)) {
            //  if file for any reason doesn't exist than throw a new exception
            throw new Exception("File $path not found!");
        }

        //  ... other wise include the file
        include_once $path;

    } catch (\Exception $e) {

        //  catching the exception in admin side
        //      put error message to the session and send user to index admin page
        $_SESSION['exception'] = 'Page not found';
        return header("Location: /admin");
    }
});

//  initialize a new application instance and return it
$app = new App\App();

return $app;