<?php

// Data for docker configuration
define("DB_HOST", "mysql"); // Docker service name
define("DB_USER", "app_user");
define("DB_PASS", "app_pass");
define("DB_NAME", "rest");

spl_autoload_register(function ($class) {
    $file = BASE_PATH . '/server/classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
