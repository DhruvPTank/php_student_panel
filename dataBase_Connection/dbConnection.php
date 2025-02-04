<?php
$host = "localhost";
$user = "root";  // Change if using a different username
$pass = "";      // Change if password is set
$dbname = "students_crud";

$connection = new mysqli($host, $user, $pass, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
