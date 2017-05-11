<?php

class Post
{
    private $id;
    private $head;
    private $url;
    private $post;
    private $user_id;
    private $date;
    private $votes;

    public function getId()
    {
        return $this->id;
    }

    public function getHead()
    {
        return $this->head;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getVotes()
    {
        return $this->votes;
    }

//    Public function createNewPost()
//    {
//        $db = new Database();
//        $query = $db->query("INSERT INTO posts (head, post, user_id, `date`)
//            VALUES ('".$this->getHead()."','".$this->getPost()."','".$this->author."','".$this->getDate()."')");
//        return $query;
//    }

    public function createNewPost($head, $post, $userId, $date)
    {
        $db = new Database();
        $query = $db->query("INSERT INTO posts (head, post, user_id, datum)
        VALUES ('".$head."', '".$post."', '".$userId."', '".$date."')");

        return $query;
    }

    public function getPosts()
    {
        $db = new Database();
        $query = $db->getObjects('SELECT * FROM posts', 'Post');

        return $query;
    }

    public function getSinglePost($id)
    {
        $db = new Database();
        $query = $db->getObjects("SELECT * FROM posts
            WHERE id ='".$id."'", 'Post');

        return $query;
    }

    public function object($arr)
    {
        return new self($arr);
    }
}
