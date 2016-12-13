<?php

/**
 *
 */
class Database
{
    private $host = "127.0.0.1";
    private $dbName = "";
    private $username = "root";
    private $password = "root";
    private $socetType = "mysql";

    private $instance = NULL;

    function __construct()
    {
        if ($this->instance == NULL) {
            try {
                $db = new PDO (''.$this->socetType .':host='. $this->host .';dbname='. $this->dbName .'', $this->username, $this->password );

                $this->instance = $db;
            } catch (Exception $e) {
                die($e->getMessage());            }
        }
    }

    public function query($sql)
    {
        $query = $this->instance->prepare($sql);
        $query->bindValue($sql);
        $query->execute();

        return $query;
    }
}
