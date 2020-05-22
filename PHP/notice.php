<?php 
require 'config.php';
$userId = $_SESSION['userName'];
$group = $_POST['group'];
$notice = $_POST['notice'];
$type = $_POST['notice_type'];
    $sql = "INSERT INTO notice(LecID,GroupID,Notice,Type) VALUES('$userId','$group', '$notice', '$type')";
    if ($con -> query($sql)) {
        header("Location: ../noticeSucess.php");
	}
	else{
		echo "Error:". $con->error;
	}
$con->close();
?>