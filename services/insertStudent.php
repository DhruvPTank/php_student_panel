<?php
error_reporting(E_ALL);

// include('../dataBase_Connection/dbConnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $f_name = mysqli_real_escape_string($connection, $_POST['firstName']);
    $l_name = mysqli_real_escape_string($connection, $_POST['lastName']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);


    // Prepare and execute the insert query
    $query = "INSERT INTO `students` (`firstName`, `lastName`, `age`) VALUES ('$f_name', '$l_name', '$age')";
    $result = mysqli_query($connection, $query);

    // Check for query errors
    if (!$result) {
        echo ('Query failed: ' . mysqli_error($connection));
    } else {
        header('Location: http://localhost/studentsPanel/index.php'); // Adjust the URL to match your project location

    }
    exit();
}
?>

<!-- Modal Start-->
<form action="./services/insertStudent.php" method="POST" id="insertStudentForm">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updateId" name="id">
                    <div class="form-group mb-3">
                        <label for="updateFirstName">First Name</label>
                        <input type="text" class="form-control" id="updateFirstName" name="firstName">
                    </div>
                    <div class="form-group mb-3">
                        <label for="updateLastName">Last Name</label>
                        <input type="text" class="form-control" id="updateLastName" name="lastName">
                    </div>
                    <div class="form-group mb-3">
                        <label for="updateAge">Age</label>
                        <input type="text" class="form-control" id="updateAge" name="age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Add New Student">
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal End -->