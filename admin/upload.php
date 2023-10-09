<?php

//upload.php

/*$folderPath = 'upload/';

$image_parts = explode(";base64,", $_POST['image']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = $folderPath . uniqid() . '.png';

file_put_contents($file, $image_base64);

echo $file;*/
session_start();
include("db_connection/connection.php");
if(isset($_POST["image"]))
{
	$data = $_POST["image"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);
	$imgrand=random_int(00000,99999);
	$imageName = $imgrand. '.jpg';
	$row=mysqli_fetch_assoc(mysqli_query($con,"select image from admin where email='{$_SESSION['user']}'"));
	if($row['image']!="default.png"){ 
		if(file_exists("upload/user/".$row['image'])){
			unlink("upload/user/".$row['image']);
		}
	
	}
	if(mysqli_query($con,"update admin set image='$imageName' where email='{$_SESSION['user']}'"))
	{
		file_put_contents("upload/user/".$imageName, $data);
		echo 1;
	}
	else {
		echo 0;
	}

}







?>