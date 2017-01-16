<?php

class Query
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getObjectById ($id, $table, $class)
    {
        $query = $this->db->getObjects("SELECT * FROM {$table}
            WHERE id = {$id}", $class);
        return $query;
    }

    public function getObjects ($table, $class)
    {
        $query = $this->db->getObjects("SELECT * FROM {$table}", $class);
        return $query;
    }

    public static function createRowString($arr)
    {
        $row = null;
        $values = null;
        $i = 0;
        foreach ($arr as $key => $value) {
            $i++;
            if (count($arr) === $i) {
                $row = $row . $key;
            } else {
                $row = $row . $key . ", ";
            }
        }
            return $row;
        }

        public static function createValueString($arr)
    {
        $row = null;
        $values = null;
        $i = 0;
        foreach ($arr as $key => $value) {
            $i++;
            if (count($arr) === $i) {
                $values = $values . $value;
            } else {
                $values = $values . $value . ", ";
            }
        }
        return $values;
    }

    public  function insertData($rows, $values, $table)
    {
        $query = $this->db->query("INSERT INTO $table ('".$rows."')
        VALUES ('".$values."')", $table);
        return $query;
    }

    public  function insertDataById($rows, $values, $table)
    {
        $query = $this->db->query("INSERT INTO $table ('".$rows."')
        VALUES ('".$values."')", $table);
        return $query;
    }


}