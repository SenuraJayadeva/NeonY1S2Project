<?php 
require '../PHP/config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
    $sql = "INSERT INTO conctact(Name, Email, Message) VALUES('$name', '$email', '$message')";
    if ($con -> query($sql)) {
        header("Location: ../contactSucces.php");
	}
	else{
		echo "Error:". $con->error;
	}
$con->close();
?>