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
    $sql = "DELETE FROM lecturer WHERE userID = '$_GET[Lid]' " ;

    if($conn->query($sql) === TRUE)
    {
        echo "Query Executed";
        header("Location:lecturer_Delete.php");
        die();
    }
    else
    {
        echo "Error Deleting Data";
    }

    $conn->close();

?>