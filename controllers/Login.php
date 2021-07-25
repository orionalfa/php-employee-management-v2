<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render("login/index");
    }

    public function render()
    {
        $this->view->render("login/index");
    }

    public function login()
    {
        $user = $this->model->loginUser($_POST);
        print_r($user);
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
            header("Location:" . BASE_URL . "employees/render");
        } else {
            header("Location:" . BASE_URL . "login?message=error");
        }
    }

    public function logout()
    {
    }
}
