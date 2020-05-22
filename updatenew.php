

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

 if($_POST['submit'])
 {
     $Leid =  $_POST['LecID'];
     $Lename  = $_POST['Lecfullname'];
     $Leage =  $_POST['LecAge'];
     $Leemail = $_POST['LecEmail'];
     $Lecontact = $_POST['LecPhoneNumber'];
     $Lefaculty = $_POST['LecFaculty'];

     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
     $fileNameNew = $userID.".jpg";
     $fileDestination = '../images/uploads/'.$fileNameNew;
     $fileDestinationP = 'images/uploads/'.$fileNameNew;
     
     if(isset($_POST["submit"])) {
         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false) {
             $uploadOk = 1;
         } else {
             echo "File is not an image.";
             $uploadOk = 0;
         }
     }
     
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
     
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
     } else {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileDestination)) {
             $res1 = $con -> query("UPDATE lecturer SET ProfilePic = '$fileDestinationP' WHERE userID='$userID'") OR die(mysqli_error());
             echo "<script>window.close();</script>";
         
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
    
     
    
     $query = "UPDATE lecturer SET LecturerName='$Lename',LecturerAge='$Leage',LecturerEmail='$Leemail',LecturerContact='$Lecontact',LecturerFacluty='$Lefaculty' WHERE userID = '$Leid' ";
     $data=mysqli_query($conn, $query);
     if($data)
     {
         echo "Record Updated Successfully";
         header("Location:lecturer_Update.php");
         die();
     }
     else
     {
         echo "Recort not updated";
     }



    
 }

 $conn->close();

?>

