<?php


class LoginController extends Controller
{
    public function __construct()
    {
        //This calls to the constructor of the class controller is extending
        parent::__construct();

        echo '<p>Login Controller</p>';
    }

    public function getUserByName($userName)
    {
        if(isset($this->model)){
            $result = $this->model->getUserByName($userName);
            var_dump($result);
            return $result;
        }else{
            echo "Login Model not loaded";
            return false;
        }

    }


}