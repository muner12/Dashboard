<?php
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ubunerstudent@gmail.com';                    
    $mail->Password   = 'apydosgfgmjnzmab';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('ubunerstudent@gmail.com');
    $email=$_POST['email'];
    $mail->addAddress($email);   //reciver addAddress          
    $otp=random_int(0000000,999999);

    $mail->isHTML(true);                                 
    $mail->Subject = 'OTP';
    $mail->Body    = '<div>
    We are writing to verify your identity and ensure the security of your account. As part of our ongoing commitment to safeguard your information, we have implemented an additional layer of security through One-Time Password (OTP) verification.<br>

    To proceed with the OTP verification, please find below the OTP code you need to enter:
    <br>
    OTP Code: '.$otp.'
    <br>
    Please note that this OTP code is valid for a limited time only and should not be shared with anyone. If you did not initiate this verification or suspect any unauthorized access to your account, please contact our support team immediately';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'yes';
    mysqli_query($con,"delete from user_otp where email='$email'");
    mysqli_query($con,"insert into user_otp(email,otp) values('$email',$otp)");
} catch (Exception $e) {
    echo "NO";
}