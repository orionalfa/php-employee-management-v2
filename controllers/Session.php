<?php

class Session
{
    public function __construct()
    {
        session_start();
    }

    function manageSession()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }
}
