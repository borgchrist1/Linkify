<?php

class Query
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getSinglePost ($id)
    {
        $query = $this->db->getObjects("SELECT * FROM posts
            WHERE id ='".$id."'", "Post");
        return $query;
    }

}