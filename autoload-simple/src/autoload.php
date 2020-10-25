<?php
spl_autoload_register(function ($className) {
    // Rectify $className to match the file location for that class.
    $className = str_replace(["\\", "MyProject"], ["/", "src"], $className);
    $filename  =  ABSPATH . "/$className.php";

    if (file_exists($filename)) {
        require($filename);
    }
});
