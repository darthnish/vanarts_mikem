<?php


namespace App\Core;
use PDO;

/**
 * Class SQL
 *
 * this class contains standard SQL functions to deal with database
 *
 * @package App\Core
 */
class SQL {
    use Traits\Singleton;

    protected $db = null;

    protected function __construct () {
        $config = include '../config/config.php';

        $this->db = new PDO("{$config['db']['driver']}:host={$config['db']['host']};dbname={$config['db']['name']}",
            $config['db']['user'],
            $config['db']['pass'],
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        $this->db->exec("SET NAMES UTF8");
    }

    public function insert ($table, $params) {
        $masks = [];

        foreach ($params as $k => $v) {
            $masks[] = ':'.$k;
        }
        $fields = implode(', ', array_keys($params));
        $values = implode(', ', $masks);

        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $this->checkQuery($query);

        return $this->db->lastInsertId();
    }

    public function select ($sql, $params = []) {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $this->checkQuery($query);

        return $query->fetchAll();
    }

    public function delete ($table, $filter, $params = []) {
        $sql = "DELETE FROM $table WHERE $filter";
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $this->checkQuery($query);

        return $query->rowCount();
    }

    public function update ($table, $pairs = [], $filter = null, $params = []) {
        $masks = [];

        foreach (array_keys($pairs) as $item) {
            $masks[] = $item.' = :'.$item;
        }
        $fields = implode(', ', $masks);

        $sql = "UPDATE $table SET $fields WHERE $filter";
        $query = $this->db->prepare($sql);
        $query->execute(array_merge($pairs, $params));
        $this->checkQuery($query);

        return $query->rowCount();
    }

    public function checkQuery ($query) {
        if ($query->errorCode() != PDO::ERR_NONE) {
            throw new \Exception($query->errorInfo()[2]);
        }
    }
}
