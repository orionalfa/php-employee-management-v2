<?php

echo "<p>Index entry</p>";

require_once("config/baseConstants.php");
require_once("config/constants.php");
// require_once("config/constants.php");

// echo "<p>". BASE_PATH . "</p>";

// require_once(LIBS . "/View.php");

require_once(LIBS . "/Controller.php");
require_once(LIBS . "/Model.php");
require_once(LIBS . "/Router.php");

$router = new Router();