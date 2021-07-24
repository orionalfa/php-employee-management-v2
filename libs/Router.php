<?php
// require_once(CONTROLLERS . '/FailureController.php');

class Router
{
    function __construct()
    {
        // echo "<p>Router Loaded</p>";
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // var_dump($url);
        if (empty($url[0])) {
            $fileController = CONTROLLERS . "/Login.php";
            require_once $fileController;
            $controller = new Login();
            $controller->loadModel('Login');
            return false;
        }
        $ucFirst = ucfirst($url[0]);

        $fileController = CONTROLLERS . "/" . $ucFirst . ".php";
        if (file_exists($fileController)) {
            require_once $fileController;

            $controller = new $ucFirst();
            $controller->loadModel($ucFirst);
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        } else {
            echo "Router error";
            echo $fileController;
        }
    }
}
