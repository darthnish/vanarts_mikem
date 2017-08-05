<?php


namespace App\Models;


class Tour extends Base{
    use \App\Core\Traits\Singleton;

    protected function __construct () {
        parent::__construct();
        $this->table = 'tour';
        $this->primaryKey = 'id';
    }

    public function getAll ($order = null) {
        return parent::getAll('ORDER BY date DESC');
    }
}