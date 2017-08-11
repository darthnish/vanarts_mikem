<?php


namespace App\Models;


class User extends Base{
    use \App\Core\Traits\Singleton;

    protected function __construct () {
        parent::__construct();
        $this->table = 'users';
        $this->primaryKey = 'id';
    }

    public function getAll ($order = null) {
        return parent::getAll('ORDER BY id DESC');
    }
}