<?php
require 'config.php';
session_start();
$userID = $_SESSION['userName'];
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
        $res1 = $con -> query("UPDATE student SET ProfilePic = '$fileDestinationP' WHERE UserID='$userID'") OR die(mysqli_error());
        echo "<script>window.close();</script>";
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
