<?php

require_once(MODELS . '/entities/employee.php');


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
    }


    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM employees WHERE id = $id";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $employee = new Employee(
                $results['id'],
                $results['name'],
                $results['lastName'],
                $results['email'],
                $results['gender'],
                $results['streetAddress'],
                $results['age'],
                $results['address'],
                $results['city'],
                $results['state'],
                $results['postalCode'],
                $results['phoneNumber']
            );
            return $employee;
        } catch (PDOException $e) {
            echo 'Error INSERT: ' . $e->getMessage();
        }
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
    public function update($request)
    {
        $id = $request["id"];
        $name = $request["name"];
        $lastName = $request["lastName"];
        $email = $request["email"];
        $gender = $request["gender"];
        $city = $request["city"];
        $streetAddress = $request["streetAddress"];
        $state = $request["state"];
        $age = $request["age"];
        $postalCode = $request["postalCode"];
        $phoneNumber = $request["phoneNumber"];

        try {
            $sql = "UPDATE employees SET name = :name,
                lastName = :lastName,
                email = :email,
                gender = :gender,
                city = :city,
                streetAddress = :streetAddress,
                state = :state,
                age = :age,
                postalCode = :postalCode,
                phoneNumber = :phoneNumber
                WHERE id = :id";
            $query = $this->db->connect()->prepare($sql);
            $query->execute(['id' => $id, 'name' => $name, 'lastName' => $lastName, 'email' => $email, 'gender' => $gender, 'city' => $city, 'streetAddress' => $streetAddress, 'state' => $state, 'age' => $age, 'postalCode' => $postalCode, 'phoneNumber' => $phoneNumber]);
            return true;
        } catch (PDOException $e) {
            echo 'Error UPDATE:' . $e->getMessage();
            return false;
        }
    }
}
