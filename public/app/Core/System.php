<?php


namespace App\Core;


class System {

    public static function buildTemplate ($path, $vars = []) {
//    function for rendering page template
//    put all variables into template .php, cache the result and return it as string

        extract($vars);
        ob_start();
        include ("app/Views/$path");
        return ob_get_clean();
    }
}
