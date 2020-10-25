<?php
spl_autoload_register(function ($className) {
    // Rectify $className to match the file location for that class.
    // Example: Convert MyProject\API\Auth -> src/API/Auth
    $className = str_replace(["\\", "MyProject"], ["/", "src"], $className);
    $filename  =  ABSPATH . "/$className.php"; // e,g: /var/www/src/API/Auth.php

    // Check if file exists before requiring it.
    if (file_exists($filename)) {
        require($filename);
    }
});
