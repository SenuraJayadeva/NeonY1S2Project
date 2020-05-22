<?php 
require 'config.php';
$feedback = $_POST['feedback'];
    $sql = "INSERT INTO feedback(Feedback) VALUES('$feedback')";
    if ($con -> query($sql)) {
        header("Location: ../feedbackSuccess.php");
	}
	else{
		echo "Error:". $con->error;
	}
$con->close();
?>