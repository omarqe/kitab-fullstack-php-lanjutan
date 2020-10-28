<?php
require(__DIR__ . "/DB.php"); // e.g: /var/www/DB.php, C:\xampp\htdocs/DB.php

$db = DB::getInstance();
$res = $db->query("SELECT name FROM sm_user");
if ($res !== false) {
    while ($row = $res->fetch_assoc()) {
        echo "{$row['name']}<br/>";
    }
}

echo "<h2>Fetching with Prepared Statement</h2>";
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Use anonimized (?) character as the placeholder for value
    $stmt = $db->prepare("SELECT name FROM sm_user WHERE id = ?");
    $stmt->bind_param("s", $id); // Bind $id to the ? in query
    if ($stmt->execute()) { // Execute the query
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        echo $row["name"];
    }
}
