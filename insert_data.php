<?php
include 'dbcon.php';

if (isset($_POST['add_student'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $age = $_POST['age'];

    if ( empty($firstname || empty($lastname)) || empty($age)) {
        header('location:index.php');
    } else {
        $query = "INSERT INTO `student` (`first_name`, `last_name`, `age`) VALUES ('$firstname', '$lastname', '$age')";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query Failed" . mysqli_error($connection));
        } else {
            header('location:index.php');
        }
    }

}
