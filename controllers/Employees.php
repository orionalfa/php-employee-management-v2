<?php
class Employees extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();
        // $this->view->render('employees/index');

        // echo '<p>Employees Controller</p>';
    }

    public function render()
    {
        $this->view->render('employees/index');
    }

    public function getAll()
    {
        echo json_encode($this->model->getAll());
    }


    public function getEmployeeById($id)
    {
        if (isset($this->model)) {
            session_start();
            $_SESSION["employee"] = $this->model->getById($id);
            header("Location:" . BASE_URL . "employees/renderEmployee");
        } else {
            echo "<br>Employees Model not loaded";
        }
    }

    public function renderEmployee()
    {
        $this->view->render("employees/employee");
    }


    public function addEmployee()
    {
        $this->view->render("employees/newEmployee");
    }

    public function insertEmployee()
    {
        try {
            $this->model->insert([
                // 'id' => $_POST['id'],
                'name' => $_POST['name'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'age' => $_POST['age'],
                'streetAddress' => $_POST['streetAddress'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postalCode' => $_POST['postalCode'],
                'phoneNumber' => $_POST['phoneNumber']
            ]);
            print_r($_POST);
            header("Location:" . BASE_URL . "employees/render");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateEmployee()
    {
        $this->model->update([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'city' => $_POST['city'],
            'streetAddress' => $_POST['streetAddress'],
            'state' => $_POST['state'],
            'age' => $_POST['age'],
            'postalCode' => $_POST['postalCode'],
            'phoneNumber' => $_POST['phoneNumber']
        ]);
        $employee = $this->model->getById($_POST["id"]);
        $this->view->employee = $employee;

        header("Location:" . BASE_URL . "employees/render");
    }

    public function handleData()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "DELETE":
                parse_str(file_get_contents("php://input"), $_DELETE);
                $this->model->delete(intval($_DELETE["id"]));
                break;
            case "POST":
                parse_str(file_get_contents("php://input"), $_POST);
                $this->model->insert($_POST);
                break;
            case "PUT":
                parse_str(file_get_contents("php://input"), $_PUT);
                $this->model->update($_PUT);
                break;
        }
    }
}
