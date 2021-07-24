<?php

// include_once ENTITIES . '/Employees.php';

class EmployeesModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        // echo '<p>Employees model</p>';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM employees";

        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
        // $employeesDb = new Employees;
        // $all = $employeesDb->getAll();
        // return $all;
    }


    public function getById($id)
    {
        $employeesDb = new Employees;
        $targetEmployee = $employeesDb->getById($id);
        return $targetEmployee;
    }

    public function insert($data)
    {

        try {
            //Insert data into DB
            $query = $this->db->connect()->prepare('INSERT INTO employees (
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
        } catch (PDOException $e) {
            echo 'Error INSERT: ' . $e->getMessage();
            if ($e->errorInfo[1] == 1062) {
                return "This email already exists";
            } else {
                return "Database error";
            }
            return  $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            //Delete entry from DB
            $sql = 'DELETE FROM employees WHERE id = :id';
            $query = $this->db->connect()->prepare($sql);
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error DELETE: ' . $e->getMessage();
            return false;
        }
    }
}
