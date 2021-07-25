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
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function loginUser($data)
    {
        if (!isset($data["username"]) || !isset($data["password"])) {
            return "Missing Username or Password";
        }
        $usersInfo = $this->getUser();
        $usersData = $usersInfo[0];

        $isValidated = false;
        if ($data["username"] == $usersData['user_name'] && password_verify($data["password"], $usersData["user_password"])) {
            $_SESSION["username"] = $data["username"];
            return $usersData;
        } else {
            return $isValidated;
        }
    }
}
