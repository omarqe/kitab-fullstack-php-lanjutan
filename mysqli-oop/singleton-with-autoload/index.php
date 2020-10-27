<?php
require(__DIR__ . '/vendor/autoload.php');

$db = MyProject\DB::getInstance();

echo "<h2>Fetching using normal query</h2>";
$res = $db->query("SELECT name FROM sm_user");
if ($res !== false) {
    while ($row = $res->fetch_assoc()) {
        echo "{$row['name']}<br/>";
    }
}

echo "<br/><h2>Fetching using <code>DB::select()</code> helper method</h2>";
$res = $db->select("sm_user", ["name"]);
if ($res !== false) {
    while ($row = $res->fetch_assoc()) {
        echo "{$row['name']}<br/>";
    }
}
