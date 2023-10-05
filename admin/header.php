<?php
require("db_connection/connection.php");
include("constants.php");
session_start();
if(!isset($_SESSION['user'])){
    
  header("Location:{$ROOT}/index.php");
}
if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    session_destroy();
    header("Location:{$ROOT}/index.php");
}






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   
  <!-- font awesom link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- jquery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
  <title>Dashboard</title>

  <style>
        /* Custom CSS for the circular file upload button */
        .custom-file-input {
            display: none;
        }

        .custom-file-upload-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .custom-file-upload-circle:hover {
            border-color: #333;
        }

        .custom-file-label {
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
  </head>
  <body>
    <!-- navbar  start -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo $ROOT."/dashboard.php"?>">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $ROOT."/dashboard.php"?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Add species
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href=<?php echo $ROOT."/Algae.php"?>>Algae</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Fungi.php"?>>Fungi</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Lichens.php"?>>Lichens</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Bryophyte.php"?>>Bryophyte</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Pteridophytes.php"?>>Pteridophytes</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Angiosperm.php"?>>Angiosperms</a>
          <a class="dropdown-item" href=<?php echo $ROOT."/Gymnosperms.php"?>>Gymnosperms</a>
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li> -->
      <li class="nav-item">
        <?PHP
         $query=mysqli_query($con,"select * from admin where email='{$_SESSION['user']}'");
        $row=mysqli_fetch_assoc($query);
        ?>
        <?PHP
        if($row['role']=='superAdmin'){?>
        <a href="<?PHP echo $ROOT."/addAdmin.php"?>" class="nav-link ">Add Admin</a>
        <?PHP }?>
      </li>
    </ul>
    <form method="post" class="form-inline my-2 d-flex align-items-baseline  my-lg-0">
     <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
       <!-- <p class="mr-5 text-white ">
       <i class="fa-solid fa-user"  style="color: #ffffff;"></i>
       <?php
      //  $row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where email ='{$_SESSION['user']}'"));
      //  echo $row['name']."-".ucfirst($row['role']);
      //  ?>  
       
     
        </p>  -->

        <ul class="navbar-nav mr-5 pr-5">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          
           <?PHP
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where email='{$_SESSION['user']}'"));
          
        if(isset($row['image'])){
         echo "<image src='upload/user/" . $row['image'] . "' width='30' height='30'>";

       }else{
         echo "<image src='$ROOT./upload/user/default.png' width='30' height='30'>";
        }
        ?>
         
        
      
        </a>
        <div class="dropdown-menu">
        <a href="<?PHP echo $ROOT.'/Profile.php'?>" class=" dropdown-item my-2 my-sm-0">Profile </a>
        
        <button class=" dropdown-item my-2 my-sm-0 text-danger" name="logout"  type="submit">Logout</button>
       
          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
        </ul>
     
      
      <!-- <input class="btn btn-mute" name="logout" type="submit" value="logout">
     -->
    </form>
    
  </div>
</nav>
    <!-- navbar end -->