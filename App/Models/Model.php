<?php
namespace App\Model;
use App\Database\Database;
require_once APP_ROOT . 'Database/Database.php';

abstract class Model {

    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    public $lastId;
    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->connect();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO {$this->table} SET ";
        $columnPairs = [];

        foreach($data as $key => $val) {
            $key = $this->db->real_escape_string($key);
            $val = $this->db->real_escape_string($val);
            $columnPairs[] = "{$key} = '{$val}'";
        }
        $sql .= implode(', ', $columnPairs);

        if(!$this->db->query($sql)) {
            return false;
        }

        $this->lastId = $this->db->insert_id;
        return true;
    }

    public function update(int $id, array $data)
    {
        $sql = "UPDATE {$this->table} SET ";
        $columnPairs = [];

        foreach($data as $key => $val) {
            $key = $this->db->real_escape_string($key);
            $val = $this->db->real_escape_string($val);
            $columnPairs[] = "{$key} = '{$val}'";
        }

        $sql .= implode(', ', $columnPairs);
        $sql .= " WHERE {$this->primaryKey} = {$id}";
        return $this->db->query($sql);
    }

    public function get(int $id)
    {
        $res = $this->db->query(
            "SELECT * FROM {$this->table}
            WHERE {$this->primaryKey} = {$id} LIMIT 1"
        );

        if($res->num_rows < 1) {
            return false;
        }

        return $res->fetch_assoc();
    }

    public function getBy(array $conditions)
    {
        $mergedConditions = implode(' AND ', $conditions);
        $res = $this->db->query(
            "SELECT * FROM {$this->table} 
            WHERE {$mergedConditions}"
        );

        $results = [];
        while($result = $res->fetch_assoc()) {
            $results[] = $result;
        }
        return $results;
    }

    public function getAll($limit = false)
    {
        $sql = "SELECT * FROM {$this->table}";
        if(isset($limit) and !empty($limit)) {
            $sql .= ' LIMIT ' . $limit;
        }

        $res = $this->db->query($sql);

        if($res->num_rows < 1) {
            return [];
        }

        $results = [];
        while($result = $res->fetch_assoc()) {
            $results[] = $result;
        }
        return $results;
    }

}