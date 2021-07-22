<?php

require_once "libs/Database.php";

class Users extends Database
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();
        if(FLOW_CONTROL)
            echo '<p>Users entity</p>';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    public function getByName($userName)
    {
        $sql = "SELECT * FROM users WHERE user_name = $userName";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;


    }
}