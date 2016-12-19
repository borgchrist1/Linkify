<?php

class Post {
    private $head = null;
    private $post = null;
    private $author = null;
    private $date = null;

    function  __construct($head, $post, $author, $date)
    {
        $this->head = $head;
        $this->post = $post;
        $this->author = $author;
        $this->date = $date;
    }

    public function getHead()
    {
        return $this->head;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDate()
    {
        return $this->date;
    }

    Public function createNewPost()
    {
        $db = new Database();
        $query = $db->query("INSERT INTO posts (head, post, user_id, `date`)
            VALUES ('".$this->getHead()."','".$this->getPost()."','".$this->author."','".$this->getDate()."')");
        return $query;
    }

}