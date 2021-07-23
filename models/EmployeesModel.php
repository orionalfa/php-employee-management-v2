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

    public function getAll()
    {
        $employeesDb = new Employees;
        $all=$employeesDb->getAll();
        return $all;


    }

    public function getById($id)
    {
        $employeesDb = new Employees;
        $targetEmployee = $employeesDb->getById($id);
        return $targetEmployee;
    }

}