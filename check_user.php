<?PHP

include 'config.php';

$email=mysqli_real_escape_string($con,$_POST['email']);

if($email!=""){

    $query="select * from admin where email='$email'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        echo "1";
    }
    else{
        echo "0";
    }

}else{
    echo "email";
}




?>