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
            $result = $this->model->getById($id);
            $this->view->id = $id;
            echo json_encode($result);
        } else {
            echo "<br>Employees Model not loaded";
        }
    }

    public function renderEmployee($id)
    {
        $this->view->id = $id;
        $this->view->render("employees/employee");
    }

    public function insertEmployee()
    {
        try {
            $this->model->insert($_POST);
            header("Location:" . BASE_URL);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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
    // public function insert($data)
    // {
    //     if (isset($this->model)) {
    //         $result = $this->model->insert($data);
    //         return $result;
    //     } else {
    //         echo "<br>Employees Model not loaded";
    //         return false;
    //     }
    // }

    // public function delete($id)
    // {
    //     if (isset($this->model)) {
    //         return $this->model->delete($id);
    //     } else {
    //         echo "<br>Employees Model not loaded";
    //         return false;
    //     }
    // }
}
