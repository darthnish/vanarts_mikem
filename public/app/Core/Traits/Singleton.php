<?php


namespace App\Core\Traits;


trait Singleton {
    protected static $singleton_instance = null;

    public static function getInstance () {
        if (static::$singleton_instance === null) {
            static::$singleton_instance = new static();
        }

        return static::$singleton_instance;
    }

    protected function __constrict () {}        //if parameters will not be empty, delete the string or redefine constructor
    protected function __clone () {}
    protected function __sleep () {}
    protected function __wakeup () {}
}