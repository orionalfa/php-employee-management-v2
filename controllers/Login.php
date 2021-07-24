<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

class Login extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();
        $this->view->render("login/index");

        // echo '<p>Login Controller</p>';
    }

    // public function render()
    // {
    //     $this->view->render("login/index");
    // }

    public function loginUser()
    {
        echo "login";
        $user = $this->model->userLogin();

        if (isset($user["user_name"])) {
            echo $user["user_name"];
            // session_start();
            $_SESSION["username"] = $user["user_name"];
            header("Location:" . BASE_URL . "employees/render");
        } else {
            $this->view->render("login/index");
        }
    }

    // public function render()
    // {
    //     $this->view->render('login/index');
    // }


    // public function getUserByName($userName)
    // {
    //     if (isset($this->model)) {
    //         $result = $this->model->getUserByName($userName);
    //         var_dump($result);
    //         return $result;
    //     } else {
    //         echo "Login Model not loaded";
    //         return false;
    //     }
    // }
}
