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
            $nParams = sizeof($url);

            if ($nParams == 2) {
                $controller->{$url[1]}();
            } elseif ($nParams == 3) {
                $controller->{$url[1]}($url[2]);
            } elseif ($nParams > 3) {
                $params = array();
                for ($i = 2; $i < $nParams; $i++) {
                    $controller->{$url[1]}($params);
                }
            }
        } else {
            // echo "Router error";
            require_once CONTROLLERS . "/Failure.php";
            $controller = new FailureController;
        }
    }
}
