

<?php
require 'PHP/config.php';
session_start();
if (isset($_SESSION['userName'])) {
    $userID = $_SESSION['userName'];
    if (strpos($userID, 'LEC') !== false) {
        $proTable = 'Lecturer';
    } else if (strpos($userID,'AD') !== false) {
        $proTable = 'Admin';
    } else if (strpos($userID,'IT') !== false) {
        $proTable = 'student';
    }

    $userID = $_SESSION['userName'];
    $resultPic = $con -> query("SELECT * FROM $proTable WHERE userId='$userID'") OR die(mysqli_error());
if (mysqli_num_rows($resultPic) > 0) {
         while ($row2 = mysqli_fetch_array($resultPic)) {
            $avatar = $row2['ProfilePic'];
         }
     }
} else {
    $avatar = "images/user.png";
}

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

 if($_POST['submit'])
 {
     $ADid =  $_POST['AdminID'];
     $ADname  = $_POST['Adminfullname'];
     $ADage =  $_POST['AdminAge'];
     $ADcontact = $_POST['AdminContact'];
     $ADemail = $_POST['AdminEmail'];

     
    
     $query = "UPDATE admin SET AdminName='$ADname',AdminAge='$ADage',AdminContact='$ADcontact',AdminEmail='$ADemail'  WHERE userID = '$ADid' ";
     $data=mysqli_query($conn, $query);
     if($data)
     {
         echo "Record Updated Successfully";
         header("Location:admin.php");
         die();
     }
     else
     {
         echo "Recort not updated";
     }

    
 }

 $conn->close();

?>

