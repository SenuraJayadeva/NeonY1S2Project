<?php

   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $database = 'mesh';

   //Create Connection
    $conn = new mysqli ($servername,$username,$password,$database);

    //Check Connection
    if($conn->connect_error)
    {
        echo "MySQL Connection Error";
    }

    //delete data from sql
    $sql1 = "DELETE FROM student WHERE UserID = '$_GET[SID]' " ;
    $sql2 = "DELETE FROM pwd WHERE stID = '$_GET[SID]' " ;

    if($conn->query($sql1) && $conn->query($sql2))
    {
        echo "Query Executed";
        header("Location:student_Delete.php");
        die();
    }
    else
    {
        echo "Error Deleting Data";
    }

    $conn->close();

?>