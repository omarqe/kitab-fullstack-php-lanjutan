<?php
$conn = @new MySQLi("localhost", "root", "p455w0rD", "sampledb");
if ($conn->connect_errno) {
    printf(
        '<h1>%s</h1>Error: %s',
        "Error connecting to the database.",
        $conn->connect_error
    );
    exit;
}

$result = $conn->query("SELECT name FROM sm_user");
if ($result !== false) {
    while ($row = $result->fetch_assoc()) {
        echo "{$row['name']}<br/>";
    }
    $result->free_result();
}
