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
                $results[0]['id'],
                $results[0]['name'],
                $results[0]['lastName'],
                $results[0]['email'],
                $results[0]['gender'],
                $results[0]['streetAddress'],
                $results[0]['age'],
                $results[0]['city'],
                $results[0]['state'],
                $results[0]['postalCode'],
                $results[0]['phoneNumber']
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
            $query = 'INSERT INTO employees (
                name,
                lastName,
                email,
                gender,
                age,
                streetAddress,
                city,
                state,
                postalCode,
                phoneNumber
              ) VALUES(
                :name,
                :lastName,
                :email,
                :gender,
                :age,
                :streetAddress,
                :city,
                :state,
                :postalCode,
                :phoneNumber
              )';
            $employee = $this->db->connect()->prepare($query);
            $employee->execute([
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'streetAddress' => $data['streetAddress'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postalCode' => $data['postalCode'],
                'phoneNumber' => $data['phoneNumber']
            ]);
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
