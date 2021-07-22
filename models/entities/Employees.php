<?php

require_once "libs/Database.php";

class Employees extends Database
{
    public function __construct()
    {
        //This calls the constructor of the class Model is extending
        parent::__construct();
        if(FLOW_CONTROL)
            echo '<p>Employees entity</p>';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM employees";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM employees WHERE id = $id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;

    }
}