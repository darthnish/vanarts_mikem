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
        //  redefine generic getAll method
        //  each time when we retrieve news data from DB, we will need to know path of image that linked to the news
        return $this->db->select("SELECT news.*, images.path FROM news JOIN images ON news.image_id = images.id ORDER BY date DESC");
    }

    public function getByID ($id) {
        //  redefine generic getByID method
        //  each time when we retrieve news data from DB, we will need to know path of image that linked to the news
        $res = $this->db->select("SELECT * FROM news JOIN images ON news.image_id = images.id WHERE news.id = :primaryKey", [
            'primaryKey' => $id
        ]);
        return $res[0] ?? null;
    }
}