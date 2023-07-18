<?PHP
include("config.php");

if(mysqli_query($con,"delete from user_otp where email='".$_POST['email']."'")){
    echo "yes";
}else{
    echo "no";
}


?>