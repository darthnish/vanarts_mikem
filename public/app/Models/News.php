<?php


namespace App\Models;


class News extends Base{
    use \App\Core\Traits\Singleton;

    protected function __construct () {
        parent::__construct();
        $this->table = 'news';
        $this->primaryKey = 'id';
    }

    public function getAll ($order = null) {
        return $this->db->select("SELECT news.*, images.path FROM news JOIN images ON news.image_id = images.id ORDER BY date DESC");
    }

    public function getByID ($id) {
        $res = $this->db->select("SELECT * FROM news JOIN images ON news.image_id = images.id WHERE news.id = :primaryKey", [
            'primaryKey' => $id
        ]);
        return $res[0] ?? null;
    }
}