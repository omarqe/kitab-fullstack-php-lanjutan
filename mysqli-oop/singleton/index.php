<?php
require(__DIR__ . "/DB.php"); // e.g: /var/www/DB.php, C:\xampp\htdocs/DB.php

$db = DB::getInstance();
$res = $db->query("SELECT name FROM sm_user");
if ($res !== false) {
    while ($row = $res->fetch_assoc()) {
        echo "{$row['name']}<br/>";
    }
}
