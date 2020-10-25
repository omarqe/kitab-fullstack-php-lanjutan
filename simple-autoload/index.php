<?php
define("ABSPATH", __DIR__); // Path of current directory, e.g: /var/www
require(ABSPATH . "/src/autoload.php");

$auth = new MyProject\API\Auth();
