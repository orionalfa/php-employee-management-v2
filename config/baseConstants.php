<?php
//$documentRoot = dirname(__FILE__);
$documentRoot = getcwd();

//BASE PATH -> FOR REFERENCE FILES
define("BASE_PATH", $documentRoot);

//LIBS
define("LIBS", BASE_PATH . '/libs');

//CONTROLLERS
define("CONTROLLERS", BASE_PATH . '/controllers');

//VIEWS
define("VIEWS", BASE_PATH . '/views');

//MODELS
define("MODELS", BASE_PATH . '/models');
