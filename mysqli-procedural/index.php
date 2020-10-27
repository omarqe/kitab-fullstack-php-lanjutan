<?php
// Establish a connection to the system
$conn = @mysqli_connect("localhost", "root", "p455w0rD", "kbtest");
if (mysqli_connect_errno()) {
    printf(
        '<h1>%s</h1>Error: %s',
        "Error connecting to the database.",
        mysqli_connect_error()
    );
    exit;
}

// Execute a MySQL query using mysqli_query() function.
$result = mysqli_query($conn, "SELECT name FROM sm_user");
if ($result !== false) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "{$row['name']}<br/>";
    }
}
