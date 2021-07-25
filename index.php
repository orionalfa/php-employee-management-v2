<?php

// echo "<p>Index entry</p>";
error_reporting(E_ALL);
ini_set("display_errors", "On");

require_once("config/baseConstants.php");
require_once("config/constants.php");
require_once("config/dbConstants.php");

// echo "<p>" . BASE_PATH . "</p>";

require_once(LIBS . "/View.php");

require_once(LIBS . "/Controller.php");
require_once(LIBS . "/Model.php");
require_once(LIBS . "/Router.php");
require_once(LIBS . "/Database.php");

$router = new Router();
