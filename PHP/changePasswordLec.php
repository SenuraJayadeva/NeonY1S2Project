<?php 
require 'config.php';
session_start();
$user = $_SESSION['userName'];
$password = $_POST['password'];
    $sql = "UPDATE lecturer SET pwd = '$password' WHERE userID='$user'";
    if ($con -> query($sql)) {
        header("Location: ../userProfileLec.php");
	}
	else{
		echo "Error:". $con->error;
	}
$con->close();
?>