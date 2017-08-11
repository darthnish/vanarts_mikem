<?php


namespace App\Models;


class Image extends Base{
    use \App\Core\Traits\Singleton;

    protected function __construct () {
        parent::__construct();
        $this->table = 'images';
        $this->primaryKey = 'id';
    }

    public function getAll ($order = null) {
        return parent::getAll('ORDER BY id DESC');
    }
}