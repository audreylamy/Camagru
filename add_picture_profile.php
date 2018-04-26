<?php
session_start();

require('new_users.class.php');
include('config/database.php');

$id_user = $_SESSION['id_user'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);

$actual_user = new Membre($conn);

$actual_user->getIdUser($id_user);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) 
{
	$check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
	} 
	else 
	{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["avatar"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
    $target_file = $target_dir."".$id_user.".".$imageFileType;
    $actual_user->getProfilPic($target_file);
	if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) 
	{
        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
        $_SESSION['upload_picture'] = "hello";
        echo $_SESSION['upload_picture'];
        $_SESSION['name_picture'] = $target_file;
        $actual_user->updateProfilePicture();
        header('Location: profile.php');
	} 
	else 
	{
        echo "Sorry, there was an error uploading your file.";
    }
}
?>