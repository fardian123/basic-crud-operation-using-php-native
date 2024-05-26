<?php
include 'dbcon.php';


if (isset($_POST["delete_student"])) {
    $id = $_POST['id'];

    $query = "DELETE from `student` where `id`='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location:index.php");
    } else {
        die("Query Failed" . mysqli_error($connection));
    }
}