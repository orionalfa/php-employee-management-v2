<?php
class EmployeesController extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();

        echo '<p>Employees Controller</p>';
    }

    public function getById($id)
    {
        if (isset($this->model)) {
            $result = $this->model->getById($id);
            var_dump($result);
            return $result;
        } else {
            echo "Employees Model not loaded";
            return false;
        }
    }


}