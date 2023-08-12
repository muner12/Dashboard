
<?php
require("db_connection/connection.php");
include("constants.php");
session_start();
if(!isset($_SESSION['user'])){
    
    header("Location:index.php");
}
if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    session_destroy();
    header("Location:index.php");
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
  </head>
  <body>
    <!-- navbar  start -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
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
          <a class="dropdown-item" href="Fungi.php">Fungi</a>
          <a class="dropdown-item" href="Lichens.php">Lichens</a>
          <a class="dropdown-item" href="Bryophyte.php">Bryophyte</a>
          <a class="dropdown-item" href="Pteridophytes.php">Pteridophytes</a>
          <a class="dropdown-item" href="Angiosperm.php">Angiosperms</a>
          <a class="dropdown-item" href="Gymnosperms.php">Gymnosperms</a>
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
    <form method="post" class="form-inline my-2 my-lg-0">
     <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->

      <button class="btn btn-outline-danger my-2 my-sm-0" name="logout"  type="submit">Logout</button>
     
      <!-- <input class="btn btn-mute" name="logout" type="submit" value="logout">
     -->
    </form>
    
  </div>
</nav>
    <!-- navbar end -->