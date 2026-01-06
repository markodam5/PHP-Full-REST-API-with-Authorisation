<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/rest/server/config/config.php");

$db = new Database();

$username = $_SESSION['username'];

$sql = "SELECT licence_key FROM users WHERE username = '$username'";
$result = $db->select($sql);

// Show username and licence_key:
if($result->num_rows > 0 ) {
    $row = $result->fetch_object();
    echo "Welcome " . $username . "<br>";
    echo "Your licence key is <span style='color:red;'>" . $row->licence_key . "</span>";
}else{
    echo "O results";
}

