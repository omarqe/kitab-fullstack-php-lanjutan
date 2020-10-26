<?php
define("ABSPATH", __DIR__); // Path of current directory, e.g: /var/www
define("FUNCTIONS", ABSPATH . '/src/functions.php');
define("AUTOLOAD", ABSPATH . '/vendor/autoload.php');

if (file_exists(FUNCTIONS)) {
    require FUNCTIONS;
}
if (file_exists(AUTOLOAD)) {
    require AUTOLOAD;
}

$authn = new MyProject\User\Auth();
$user = new MyProject\User\User();
$role = new MyProject\User\Role();
$authr = new MyProject\API\Auth();
