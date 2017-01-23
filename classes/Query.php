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

    public function getObjectByPostId ($id, $table, $class)
    {
        $query = $this->db->getObjects("SELECT * FROM {$table}
            WHERE post_id = {$id}", $class);
        return $query;
    }

    public function getObjects ($table, $class)
    {
        $query = $this->db->getObjects("SELECT * FROM {$table}", $class);
        return $query;
    }

    public function insertChangesToPost ($id, $head, $url, $post)
    {

        $query = $this->db->query("UPDATE posts
            SET head='".$head."',
            url='".$url."',
            post='".$post."'
            WHERE id={$id}");
        return $query;
    }

    public function insertChangesToUser ($id, $email, $username)
    {

        $query = $this->db->query("UPDATE users
            SET username='".$username."',
            email='".$email."'
            WHERE id={$id}");
        return $query;
    }

    public function insertAvatar ($avatar, $id)
    {
        $query = $this->db->query("UPDATE users
            SET avatar='".$avatar."'
            WHERE id={$id}");
        return $query;
    }

    public function changePassword($password, $id)
    {
        $query = $this->db->query("UPDATE users
            SET password='".$password."'
            WHERE id={$id}");
        return $query;
    }

    public function insertVoteToPost ($id, $votes, $table)
    {

        $query = $this->db->query("UPDATE {$table}
            SET votes='".$votes."'
            WHERE id='".$id."'");
        return $query;
    }

    public function deletePost($id)
    {
        $query = $this->db->query("DELETE FROM posts
WHERE id = '" . $id."'");
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
            if(!is_numeric($value)) {
                $value = "'" . $value . "'";
            }

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
        $query = $this->db->query("INSERT INTO {$table} ({$rows})
        VALUES ({$values})");
        return $query;
    }




}