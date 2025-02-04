<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./design/styles.css">
</head>

<body>

    <h1 id="main_title">My CRUD Application</h1>

    <div class="container">
        <?php include('./dashboard/header.php') ?>
        <?php include('./services/updateStudent.php') ?>
        <?php include('./services/insertStudent.php') ?>
        <?php include('./dataBase_Connection/dbConnection.php') ?>


        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM students";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query failed");
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['firstName'] ?></td>
                            <td><?php echo $row['lastName'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal"
                                    onclick="populateUpdateForm('<?php echo $row['id']; ?>', '<?php echo $row['firstName']; ?>', '<?php echo $row['lastName']; ?>', '<?php echo $row['age']; ?>')">
                                    Update
                                </button>
                            <a  class="btn btn-danger" href="./services/deleteStudent.php?id=<?= $row['id'] ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>


    </div>
    <script src="./utils/insertStudentFormValidation.js"></script>
    <?php include('./dashboard/footer.php') ?>
</body>

</html>