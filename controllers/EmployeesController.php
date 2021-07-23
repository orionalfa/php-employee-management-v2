<?php
class EmployeesController extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();

        echo '<p>Employees Controller</p>';
    }
    public function render()
    {
        $this->view->render('dashboard/index');
    }


    public function getAll()
    {
        if (isset($this->model)) {
            $result = $this->model->getAll();
            return $result;
        } else {
            echo "<br>Employees Model not loaded";
            return false;
        }
    }


    public function getById($id)
    {
        if (isset($this->model)) {
            $result = $this->model->getById($id);
            return $result;
        } else {
            echo "<br>Employees Model not loaded";
            return false;
        }
    }

    public function insert($data)
    {
        if (isset($this->model)) {
            $result = $this->model->insert($data);
            return $result;
        } else {
            echo "<br>Employees Model not loaded";
            return false;
        }
    }

    public function delete($id)
    {
        if (isset($this->model)) {
            return $this->model->delete($id);
        } else {
            echo "<br>Employees Model not loaded";
            return false;
        }
    }
}
