<?php
define("ABSPATH", __DIR__); // Path of current directory, e.g: /var/www
require(ABSPATH . "/src/functions.php"); // Helper functions
require(ABSPATH . "/src/autoload.php");

$authn = new MyProject\User\Auth();
$user = new MyProject\User\User();
$role = new MyProject\User\Role();
$authr = new MyProject\API\Auth();
