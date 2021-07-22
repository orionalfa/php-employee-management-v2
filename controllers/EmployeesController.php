<?php

// include_once ENTITIES . '/Content.php';

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
}
