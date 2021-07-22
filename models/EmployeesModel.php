<?php

include_once ENTITIES . '/Employees.php';

class EmployeesModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        echo '<p>Employees model</p>';
    }

    public function getById($id)
    {
        $employeesDb = new Employees;
        $targetEmployee = $employeesDb->getById($id);
        var_dump($targetEmployee);
    }

}