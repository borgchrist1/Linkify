<?php

class Comment
{
    private $id;
    private $avatar;
    private $comment;
    private $user_id;
    private $post_id;
    private $likes;

//    public function __construct($id = null, $comment = null, $userId = null, $postId = null, $vote = null)
//    {
//        if (!$id = null) $this->id = $id;
//        if (!$comment = null) $this->comment = $comment;
//        if (!$userId = null) $this->userId = $userId;
//        if (!$postId = null) $this->postId = $postId;
//        if(!$vote = null) $this->vote = $vote;
//    }


    public function getId()
    {
        return $this->id;
    }


    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function createComment()
    {
        $db = new Database();
        $query = $db->query("INSERT INTO comments (comment, userId, postId)
            VALUES ('".$this->getComment()."','".$this->getUserId()."','".$this->getPostId()."')");
        return $query;
    }

    public function addVote()
    {
        $db = new Database();
        $query = $db->query("INSERT INTO comments (vote)
            VALUES ('".$this->getVote()."')");
        return $query;
    }

    public function getComments($postId)
    {
        $db = new Database();
        $query = $db->getObjects("SELECT * FROM comment
            WHERE user_id ='".$postId."'", "comments");

//       return $result = usort($query, function($a, $b)
//        {
//            return strcmp($a->vote, $b->vote);
//        });
            return $query;
    }
}
