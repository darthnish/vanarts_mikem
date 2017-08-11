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

    public function find ($username, $password) {
        $res = $this->db->select("SELECT * FROM {$this->table} WHERE username = :username AND password = :password", [
            'username' => $username,
            'password' => $password,
        ]);
        return $res[0] ?? null;
    }
}