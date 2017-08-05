<?php
session_start();

spl_autoload_register(function($classname) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';

    try {
        if (!file_exists($path)) {
            throw new Exception("File $path not found!");
        }
        include_once $path;

    } catch (\Exception $e) {
        echo 'Error is catched!';
        echo '<br>';
        echo $e->getMessage();
        die;
    }
});

$app = new App\App();

return $app;