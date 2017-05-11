<?php

require 'Database.php';
class Forms
{
    public function cleanData($data)
    {
        return trim(stripcslashes($data));
    }

    public function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    }

    public function checkPassword($password, $rePassword)
    {
        if ($password !== $rePassword) {
            return false;
        }

        return true;
    }

    public function encryptPassword($password)
    {
        return md5($password);
    }

    public function checkForms($arr)
    {
        foreach ($arr as $key => $value) {
            if ($key === '') {
                return 'All fields must be filed';
            }

            if ($key !== 'password') {
                trim(stripcslashes($value));
            }
            if ($key === 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "Your email is't correctly typed";
                    break;
                }

                $email = $this->getEmailById($arr['id']);
                foreach ($email as $item) {
                    if ($item['email'] !== $value) {
                        $uniqeEmail = $this->uniqueEmail($value);
                        if ($uniqeEmail === false) {
                            return 'Email already exists';

                            break;
                        }
                    }
                }
            }

            if ($key === 'username') {
                $username = $this->getUsernameById($arr['id']);
                foreach ($username as $item) {
                    if ($item['username'] !== $value) {
                        $uniqueUsername = $this->uniqueUsername($value);
                        if ($uniqueUsername === false) {
                            return 'Username already exists';
                            break;
                        }
                    }
                }
            }

            if ($key === 'password' || $key === 'rePassword') {
                $arr['password'] = $this->encryptPassword($value);
               //print "3d <br>" . $value;
              //  print $arr["password"] . "<br>";
            }

            if ($key === 'rePassword') {
                $arr['rePassword'] = $this->encryptPassword($value);
                if ($arr['rePassword'] !== $arr['password']) {
                    return "Passwords don't match";
                    break;
                }

                unset($arr['rePassword']);
            }
        }

        return $arr;
    }

    public function uniqueEmail($email)
    {
        $db = new Database();

        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."'");
        if (count($query) > 0) {
            return false;
        }

        return true;
    }

    public function uniqueUsername($username)
    {
        $db = new Database();

        $query = $db->query("SELECT * FROM users
            WHERE username='".$username."'");
        if (count($query) > 0) {
            return false;
        }

        return true;
    }

    public function getUsernameById($id)
    {
        $db = new Database();

        $query = $db->query("SELECT username FROM users
        WHERE id='".$id."'");

        return $query;
    }

    public function getEmailById($id)
    {
        $db = new Database();

        $query = $db->query("SELECT email FROM users
        WHERE id='".$id."'");

        return $query;
    }
}
