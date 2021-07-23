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

    public function insert($data)
    {
        $result = "Insertion OK";
        try {
            //Insert data into DB
            $query = $this->connect()->prepare('INSERT INTO employees (
                name,
                lastName,
                email,
                gender,
                city,
                streetAddress,
                state,
                age,
                postalCode,
                phoneNumber
              ) VALUES(
                :name,
                :lastName,
                :email,
                :gender,
                :city,
                :streetAddress,
                :state,
                :age,
                :postalCode,
                :phoneNumber
              )');

            $query->execute($data);
            // $query->execute(['name' => $data['name'], 'email' => $data['email'], 'text' => $data['text']]);
            return $result;
        } catch (PDOException $e) {
            echo 'Error INSERT: ' . $e->getMessage();
            if ($e->errorInfo[1] == 1062) {
                return $result = "This email already exists";
            } else {
                return $result = "Database error";
            }
            return $result = $e->getMessage();
        }
    }

}