<?php 
require 'config.php';
session_start();
$user = $_SESSION['userName'];
$password = $_POST['password'];
    $sql = "UPDATE pwd SET pwd = '$password' WHERE stID='$user'";
    if ($con -> query($sql)) {
        header("Location: ../userProfileStu.php");
	}
	else{
		echo "Error:". $con->error;
	}
$con->close();
?>