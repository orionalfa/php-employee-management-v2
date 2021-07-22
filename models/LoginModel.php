<?php

include_once ENTITIES . '/Users.php';

class LoginModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        echo '<p>Login model</p>';

    }

    public function getUserByName($userName)
    {
        $usersDb = new Users;
        $targetUser = $usersDb->getByName("$userName");
        var_dump($targetUser);

    }


}