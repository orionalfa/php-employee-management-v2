<?php

// include_once ENTITIES . '/Content.php';

class LoginController extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();

        echo '<p>Login Controller</p>';
    }
    public function render()
    {
        $this->view->render('login/index');
    }
}
