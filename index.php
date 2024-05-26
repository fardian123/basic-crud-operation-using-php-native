<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
    <!-- feaether icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        h6 {
            text-align: center;
            color: red;
        }

        .delete-danger-icon {
            width: auto;
            height: 100px;
        }
        .delete_icon:hover{
            color:red;
        }
        .update_icon:hover{
            color:green;
        }
    </style>

</head>

<body>
    <?php include ('header.php'); ?>
    <?php include ('dbcon.php'); ?>

    <div class="container mt-4">
        <div class="box1 d-flex justify-content-between mb-2">
            <h1>All Students</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addData">add student</button>
        </div>

        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Read Feature
                $query = "select * from `student`";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("query failed" . mysqli_error($connection));


                } else {
                    // Display Read
                    while ($row = mysqli_fetch_assoc($result)) {
                        $student_id = $row["id"];
                        ?>
                        <tr class="">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td style="text-align: center; cursor:pointer;" data-bs-toggle="modal"
                                data-bs-target="#updateData<?php echo $student_id ?>" class="update_icon">
                                <i data-feather="edit"></i>
                            </td>
                            <td style="text-align: center; cursor:pointer;" data-bs-toggle="modal"
                                data-bs-target="#deleteData<?php echo $student_id ?>" class="delete_icon">
                                <i data-feather="trash-2"></i>
                            </td>

                        </tr>


                        <!-- Update Modal -->
                        <form action="update_data.php" method="post">
                            <div class="modal fade" id="updateData<?php echo $student_id ?>" tabindex="-1"
                                aria-labelledby="updateDataLabel<?php echo $student_id ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateDataLabel">Update Students</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="id">id</label>
                                                <input type="text" name="id" class="form-control"
                                                    value="<?php echo $row['id']; ?>" disabled>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">first name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    value="<?php echo $row['first_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">last name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    value="<?php echo $row['last_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">age</label>
                                                <input type="number" name="age" class="form-control"
                                                    value="<?php echo $row['age']; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" name="update_student" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <!-- Delete Modal -->
                        <form action="delete_data.php" method="post">
                            <div class="modal fade" id="deleteData<?php echo $student_id ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="deleteDataLabel<?php echo $student_id ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteDataLabel<?php echo $student_id ?>">Delete Student
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="assets/delete_alert.svg" alt="" class="delete-danger-icon">
                                            <H4>Are You Sure Want To Delet This User ?</H4>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="submit" type="button" class="btn btn-danger" value="Delete"
                                                name="delete_student">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>






    <!-- ADD Modal -->
    <form action="insert_data.php" method="post">
        <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataLabel">Add Students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="first_name">first name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">last name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age">age</label>
                            <input type="number" name="age" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="add_student" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- feather icons  -->
    <script>
        feather.replace();
    </script>
</body>

</html>