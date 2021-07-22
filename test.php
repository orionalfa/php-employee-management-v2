<?php
require_once "libs/Database.php";
require_once "config/baseConstants.php";
error_reporting(E_ALL);
ini_set("display_errors", "On");

// employ 
class Employees extends Database
{
    protected function getEmployees()
    {
        $sql = "SELECT * FROM employees";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }
}

// employee view test
class EmployeeView extends Employees
{
    public function showEmployee()
    {
        $results = $this->getEmployees();
        echo "<pre>";
        foreach ($results as $result) {
            echo "full name: " . $result[1] . " " . $result[2] . "<br>";
            echo "email: " . $result[3] . "<br>";
            echo "gender: " . $result[4] . "<br>";
            echo $result[5] . ", " . $result[6] . ", " . $result[7] . "<br>";
            echo "age: " . $result[8] . "<br>";
            echo "zip: " . $result[9] . "<br>";
            echo "phone: " . $result[10] . "<br><br>";
        };

        echo "</pre>";
    }
}

// class Users extends Database
// {
//     protected function getUsers()
//     {
//         $sql = "SELECT * FROM users";

//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute();

//         $results = $stmt->fetchAll();
//         return $results;
//     }
// }

// class UsersView extends Users
// {
//     public function showUsers()
//     {
//         $results = $this->getUsers();
//         echo "<pre>";
//         foreach ($results as $result) {
//             echo $result;
//         };

//         echo "</pre>";
//     }
// }

$testObj = new EmployeeView();
// $testUsersObj = new UsersView();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Script del CDN de Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Iconos traidos de Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/css/main.css">

    <!-- grid styles and functions -->
    <link type="text/css" rel="stylesheet" href="node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>

</head>

<body class="d-flex min-vh-100 flex-column justify-content-between align-item-between d-inline-block m-0 p-0">

    <?php include "./assets/html/header.html"; ?>
    <main class="min-vh-50 h-100 d-inline-block">
        <div class="">
            <div id="employeesList">
                <?= $testObj->showEmployee(); ?>
            </div>
        </div>
    </main>
    <?php include "./assets/html/footer.html"; ?>
    <!-- <script src="./assets/js/index.js"></script>
	<script>
		loadEmployeesList();
	</script> -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>