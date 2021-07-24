<?php

// include_once ENTITIES . '/Users.php';

class LoginModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        // echo '<p>Login model</p>';
    }

    public function getUser()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    public function userLogin()
    {
        $username = $_POST["username"];
        $userPass = $_POST["password"];

        if (!isset($username) || !isset($userPass)) {
            return "Missing Username or Password";
        }
        $userInfo = $this->getUser();
        $usersData = $userInfo[0];
        $isValidated = false;
        if ($username == $usersData['user_name'] && password_verify($userPass, $usersData["user_password"])) {
            $isValidated = true;
            $loggedInUser = $usersData;
        }
        return $isValidated ? $loggedInUser : "Check your Username or Password again!";
    }

    // public function getUserByName($userName)
    // {
    //     $usersDb = new Users;
    //     $targetUser = $usersDb->getByName("$userName");
    //     // var_dump($targetUser);

    // }

}
