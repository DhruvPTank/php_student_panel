<?php
// include('./dataBase_Connection/dbConnection.php'); // Corrected path

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

    // Retrieve and sanitize form data
    $id = $_POST['id'];
    $f_name = mysqli_real_escape_string($connection, $_POST['firstName']);
    $l_name = mysqli_real_escape_string($connection, $_POST['lastName']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);



    $query = "UPDATE `students` SET `firstName`='$f_name', `lastName`='$l_name', `age`='$age' WHERE `id`='$id'";

    $result = mysqli_query($connection, $query);

    // Check for errors
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('Location: http://localhost/studentsPanel/index.php');
        exit(); // Ensure script stops after redirection
    }
}
?>

<!-- Modal Start -->
<form action="./services/updateStudent.php" method="POST" id="studentForm">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModal">Update Student Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearFormErrors()"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="studentId" name="id" value="<?= $student['id'] ?>">
                    <div class="form-group mb-3">
                        <label class="mb-1" for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $student['firstName'] ?>">
                        <div id="firstNameError" class="text-danger" style="display:none;">First name is required.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1" for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $student['lastName'] ?>">
                        <div id="lastNameError" class="text-danger" style="display:none;">Last name is required.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1" for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="<?= $student['age'] ?>">
                        <div id="ageError" class="text-danger" style="display:none;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearFormErrors()">Close</button>
                    <input type="submit" class="btn btn-success" value="Update Student">
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal End -->