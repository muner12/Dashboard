<?PHP
include('config.php');

$result=mysqli_query($con,"select * from user_otp where email='".$_POST['email']."'");

$row=mysqli_fetch_assoc($result);
if($row['otp']==$_POST['otp']) {
 echo "yes";
}else{
    echo "no";
}


?>