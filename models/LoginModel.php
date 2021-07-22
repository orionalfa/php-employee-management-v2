<?php

// include_once ENTITIES . '/Content.php';

class LoginModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        echo '<p>Login model</p>';
    }


}