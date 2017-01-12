<?php

class Post {
    private $head;
    private $post;
    private $author;
    private $date;

//    function  __construct($head = null, $post = null, $author = null, $date = null)
//    {
//       if ($head !== null) $this->head = $head;
//       if ($post !== null) $this->post = $post;
//       if ($author !== null) $this->author = $author;
//       if ($date !== null)$this->date = $date;
//    }


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

    Public function getPosts()
    {
        $db = new Database();
        $query = $db->getObjects("SELECT * FROM posts", "Post");
        return $query;
    }

    public function getSinglePost ($id)
    {
        $db = new Database();
        $query = $db->getObjects("SELECT * FROM posts
            WHERE id ='".$id."'", "Post");
            return $query;
    }

    public function object($arr)
    {
       return new self($arr);
    }

}