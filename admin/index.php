<?php
require('db_connection/connection.php');
session_start();
$msg='';
$button='submit';
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $check_email=$_POST['email'];
    $check_password=$_POST['password'];
    if($check_email=='' || $check_password==''){
       
      
        $msg="Email and Password are required";
    }else{
       
      
        $sql="select * from admin where email='$email'";

    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    // print_r(mysqli_fetch_assoc($result));
    // echo(mysqli_num_rows($result));
    
    if(mysqli_num_rows($result)>0 && password_verify($password,$row['password'])){
      if($row['status']==0){
        $msg="Your Account is not Activate, please contact with Admin to Activate Your Account.";
      }
      else{
        $_SESSION['user']=$email;
        header("Location:dashboard.php");
      }
        

    }else{
        $msg="invalid password or email address";
    }

    }
    

    

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <title>Admin Login</title>
</head>
<body>
    <div class="box">
        <div class="divup">
            <div class="divdown">
                <h4 class="center login-text">Login Here</h4>
                <p class="text-danger"><?PHP echo $msg;?></p>
                <form class="form" method="post">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email"  autocomplete="off">

                    </div>
                    <div class="form-group">
                        <label for="name">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password"  autocomplete="off">
                        
                    </div>
                    <div class="form-group flex">
                        
                        <input type="<?PHP echo $button?>" class="btn btn-success" name="submit" id="name" value="Login"  data-toggle="modal" data-target="#exampleModalCenter" >
                        <span><a href="forgotpassword.php">Forggot Password?</a></span>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>