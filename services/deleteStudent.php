<?php

// include('./dataBase_Connection/dbConnection.php'); // Corrected path


$host = "localhost";
$user = "root";  // Change if using a different username
$pass = "";      // Change if password is set
$dbname = "students_crud";

$connection = new mysqli($host, $user, $pass, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Ensure $connection is defined
if (!isset($connection)) {
    die("Database connection failed.");
}
$id = $_GET['id'];

if ($connection->query("DELETE FROM students WHERE id=$id")) {
    header("Location: .././index.php");
} else {
    echo "Error: " . $connection->error;
}

// if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
//     $host = "localhost";
//     $user = "root";  // Change if using a different username
//     $pass = "";      // Change if password is set
//     $dbname = "students_crud";

//     $connection = new mysqli($host, $user, $pass, $dbname);

//     if ($connection->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Ensure $connection is defined
//     if (!isset($connection)) {
//         die("Database connection failed.");
//     }

//     // Retrieve and sanitize form data
//     $id = $_POST['id'];

//     // Delete query
//     $query = "DELETE FROM `students` WHERE `id`='$id'";

//     $result = mysqli_query($connection, $query);

//     // Check for errors
//     if (!$result) {
//         die("Query failed: " . mysqli_error($connection));
//     } else {
//         header('Location: http://localhost/studentsPanel/index.php');
//         exit(); // Ensure script stops after redirection
//     }
// }
