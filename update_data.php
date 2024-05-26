<?php
include 'dbcon.php';

if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $age = $_POST['age'];

    if (empty($firstname || empty($lastname)) || empty($age)) {
        header('location:index.php');
    } else {
        $query = "UPDATE `student` SET `first_name`='$firstname', `last_name`='$lastname', `age`=$age WHERE `id`='$id'";
        echo $query;
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            header('location:index.php');
        }
    }


}
