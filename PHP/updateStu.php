<?php
require 'config.php';
session_start();
$user = $_SESSION['userName'];
if (isset($_POST['save'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mName = $_POST['mName'];
    $age = $_POST['age'];
    $ad1 = $_POST['ad1'];
    $ad2 = $_POST['ad2'];
    $ad3 = $_POST['ad3'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE student SET age = '$age', addrs1 = '$ad1', addrs2 = '$ad2', addrs3 = '$ad3', city = '$city', country = '$country', fname='$fName',lname='$lName',mname='$mName',pnum='$phone',email='$email' WHERE userID='$user'";

    if($con -> query($sql)) {
        header ("location: ../editUserProfileStudent.php");
    } else {
        echo $con->error;
    }

    echo "<script>window.close();</script>";

    $con -> close();
} 
?>