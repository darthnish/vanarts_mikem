<?php


namespace App\Models;
use App\Core\SQL;

abstract class Base {
    protected $db;
    protected $table;
    protected $primaryKey;

    protected function __construct () {
        $this->db = SQL::getInstance();
    }

    public function __get ($name) {
        return $this->$name;
    }

    public function getByID ($id) {
        $res = $this->db->select("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :primaryKey", [
            'primaryKey' => $id
        ]);
        return $res[0] ?? null;
    }

    public function getByValue ($column, $value) {
        $res = $this->db->select("SELECT * FROM {$this->table} WHERE {$column} = :cKey", [
            'cKey' => $value
        ]);
        return $res[0] ?? null;
    }

    public function getAll ($order = null) {
        return $this->db->select("SELECT * FROM {$this->table} ".$order);
    }

    public function deleteByID ($id) {
        return $this->db->delete($this->table, "{$this->primaryKey} = :primaryKey", ['primaryKey' => $id]);
    }

    public function add ($params) {
        return $this->db->insert($this->table, $params);
    }

    public function updateByID ($id, $params) {
        return $this->db->update($this->table, $params, "{$this->primaryKey} = :primaryKey", ['primaryKey' => $id]);
    }
}