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

    $LecID = $_POST['LecID'];
    $Lecfullname = $_POST['Lecfullname'];
    $LecAge = $_POST['LecAge'];
    $LecEmail = $_POST['LecEmail'];
    $LecPhoneNumber = $_POST['LecPhoneNumber'];
    $LecFaculty = $_POST['LecFaculty'];
    $LecPwd = $_POST['pwd'];

    //image


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
    $fileDestination = '../images/uploads/';
    $fileDestinationP = 'images/uploads/'."$LecID.jpg";
    
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
    
    
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileDestinationP)) {
            $sql = "INSERT INTO lecturer(userID,LecturerName,LecturerAge,LecturerEmail,LecturerContact,LecturerFacluty,ProfilePic,pwd) VALUES('$LecID','$Lecfullname','$LecAge','$LecEmail','$LecPhoneNumber','$LecFaculty','$fileDestinationP','$LecPwd')" ;
            echo "<script>window.close();</script>";
        
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    if($conn->query($sql))
    {
        echo "Query Executed";
        header("Location:lecturer_insert.php");
        die();
    }
    else
    {
        echo "Error Inserting Data";
    }

    $conn->close();

?>