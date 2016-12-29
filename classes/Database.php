<?php

/**
 *
 */
class Database
{
    private $host = "127.0.0.1";
    private $dbName = "linkify";
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
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getObjects($sql, $class)
    {
        $query = $this->instance->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, $class);
        $result = $query->fetchAll();
        return $result;
    }

//    public function getObjects($sql)
//    {
//        function newpost ($head, $post, $author, $date)
//        {
//            return new Post($head, $post, $author, $date);
//        }
//        $query = $this->instance->prepare($sql);
//        $query->execute();
//        //$query->setFetchMode(PDO::FETCH_CLASS, $class);
//        $result = $query->fetchAll(PDO::FETCH_FUNC, "newpost");
//        return $result;
//    }
}
