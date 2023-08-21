<?php 
include("db_connection/connection.php");
session_start();

$error="";
$msg="";
if(isset($_POST['updatePass']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$pass=password_hash($_POST['password'],PASSWORD_DEFAULT);

	
	if(!empty($email) && !empty($pass))
	{
		$sql = "update admin set password='$pass' where email='$email'";
		$result=mysqli_query($con, $sql);
		
		   if($result){
			   
				$_SESSION['update_password']="Your Password Updated successfully Please Login";
				header("location:index.php");
				
		   }
		   else{
			   $error = "Your Password Not Updated successfully";
		   }
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!--	Title
	=========================================================-->
    <title>Forggot Password</title>
</head>

<body>



<div class="box">
    <div class="divup">
        <div class="divdown">
        <p class="text-danger" align="center" id="time"></p>
    <p id="rest_otp_msg" class="mt-5">You can reset your password here.</p>
    <p id="otp_msg"></p>


   
    <?php echo $error; ?><?php echo $msg; ?>
            <!-- Form -->
    <form method="post">
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email*">
            <p id="email_msg"></p>
        </div>

        <div class="form-group">
            <input type="password" id="newPassword" name="password" class="form-control"
                placeholder="Your New Password">
            <p id="password_msg"></p>
        </div>
        <div class="form-group">
            <input type="password" id="cPassword" class="form-control" placeholder="Confirm new password">
            <p id="cpassword_msg"></p>
        </div>
        <div class="form-group">
            <input type="text" id="otp" class="form-control" placeholder="Confirm Your otp">
            <p id="otp_error"></p>
        </div>
        <div class="form-group">
            <input style="border-radius:10px;" onclick="return val();" type="Button" id='sendotp' name="Send"
                class="btn btn-success" value="send OTP" />
        </div>
        <button id="spinner-btn" class="btn btn-success" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Sending OTP to Your Email...
</button>
        <div class="form-group">
            <input style="border-radius:10px;" onclick="return val();" type="Button" id='checkuser' name="Send"
                class="btn btn-outline-success" value="checkUser" />
        </div>
        <div class="form-group">
            <input style="border-radius:10px;" onclick="return update_pass_val()" type="submit" id='updatePassword'
                name="updatePass" class="btn btn-success" value="update" />
        </div>
        <div id="otp-send-msg"></div>
    </form>
        </div>
    </div>
</div>



    
    
    









    <!-- Wrapper End -->

    <!----jquery--->
    <!-- jquery -->





    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>
<script>
function update_pass_val() {
    if ($('#newPassword').val() != '') {
        if ($('#newPassword').val() != $('#cPassword').val()) {
            $('#cpassword_msg').html('Not Matched');
            $('#cpassword_msg').css('color', 'red');
        } else {
            return true;
        }

    } else {
        $('#password_msg').html('Password should not be empty');
        $('#password_msg').css('color', 'red');
    }

    //////////////////////

    return false;
}

function val() {
    if ($('#email').val() == '') {
        $('#email_msg').html('should not be empty');
        $('#email_msg').css('color', 'red');
        return false;
    } else {

        return true;
    }
    return false;
}





$(function() {
    $("#success-msg").fadeOut(2000)
});


$('document').ready(function() {
    $('#newPassword').hide();
    $('#sendotp').hide();
    $('#cPassword').hide();
    $('#otp').hide();
    $('#updatePassword').hide();
    $('#spinner-btn').hide();
    $('#checkuser').on('click', function() {
        var email = $('#email').val();
        $.ajax({

            url: "check_user.php",
            type: "post",
            data: {
                email: email
            },

            success: function(data1) {


                if (data1 == 1) {

                    if (email != "" && data1 == 1) {
                        
                        $('#email_msg').html('Your Account Exists');
                        $('#email_msg').css('color', 'green');
                        $('#sendotp').show();
                        $('#checkuser').hide();

                    }

                } else {
                    if (email == "") {
                        $('#email_msg').html('Please Enter Email');
                        $('#email_msg').css('color', 'red');
                    }
                    if (data1 == 0) {
                        $('#email_msg').html('your Account Does Not Exist');
                        $('#email_msg').css('color', 'red');
                        $('#sendotp').hide();
                        $('#checkuser').show();
                    }

                }

            }
        });
    });


    $("#sendotp").on('click', function() {
        var email = $('#email').val();
      
        $("#sendotp").hide();
        $("#spinner-btn").show();
        $.ajax({
            url: "sendemail.php",
            type: "post",
            data: {
                email: email
            },
            success: function(data) {
                console.log(data);
                if (data == "yes") {
                    $("#spinner-btn").hide();
                    $("#otp_msg").html('An OTP sended to ' + email +
                        ",Please Confirm Your OTP!");
                    $("#rest_otp_msg").hide();
                    $("#email_msg").hide();
                    $('#otp').show();
                    $('#email').hide();
                    $("#sendotp").hide();
                    var i = 120;
                    var stopInterval = setInterval(interval, 1000);

                    function interval() {
                        i = i - 1;
                        $("#time").html("Your OTP will be expire after " + i + " Sec");

                        if (i < 0) {
                            $.ajax({
                                url: "delete_otp.php",
                                type: "post",
                                data: {
                                    email: email
                                },
                                success: function(data) {
                                    console.log(data + "/t otp deleted");
                                    if (data == "yes") {
                                        $("#time").html("Your OTP Expired");
                                        $("#otp_msg").hide();
                                        clearInterval(stopInterval);
                                    }
                                }
                            });
                        }


                    };

                } else if(data=="OTP_SENDED"){
                   //$("#otp-send-msg").html("OTP Already sended to your email");
                   $("#spinner-btn").hide();
                    $("#otp_msg").html('An OTP sended to ' + email +
                        ",Please Confirm Your OTP!");
                    $("#rest_otp_msg").hide();
                    $("#email_msg").hide();
                    $('#otp').show();
                    $('#email').hide();
                    $("#sendotp").hide();
                }
            }

        });
    })


    $('#otp').on('keyup', function() {
        var otp = $('#otp').val();
        var email = $('#email').val();
        // if(otp.length<6)
        // {
        $.ajax({
            url: "checkotp.php",
            type: "post",
            data: {
                otp: otp,
                email: email
            },
            success: function(data) {

                if (data == "yes") {
                    $('#otp').hide();
                    $('#email').hide();
                    $('#newPassword').show();
                    $('#cPassword').show();
                    $('#updatePassword').show();
                    $('#otp_error').hide();
                    $('#otp_msg').hide();
                    $('#email_msg').hide();
                    $('#time').hide();
                } else {

                    $('#otp_error').html("Please Try Again");
                    $('#otp_error').css("color", "red");
                }
            }
        })
        // }
    });

});
</script>

</html>