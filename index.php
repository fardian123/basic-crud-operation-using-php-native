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
    </style>

</head>

<body>
    <?php include ('header.php'); ?>
    <?php include ('dbcon.php'); ?>

    <div class="container mt-4">
        <div class="box1 d-flex justify-content-between mb-2">
            <h1>All Students</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">add student</button>
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
                $query = "select * from `student`";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("query failed" . mysqli_error($connection));


                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr class="">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td style="text-align: center;"> <a href="update_page_1.php?id?<?php echo $row['id']; ?>"><i
                                        data-feather="edit"></i></a> </td>
                            <td style="text-align: center"> <a href="delete_page_1.php?id?<?php echo $row['id']; ?>"><i
                                        data-feather="trash-2"></i></a> </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>






    <!-- Modal -->
    <form action="insert_data.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
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


    <!-- footer -->
    <?php include ('footer.php') ?>


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