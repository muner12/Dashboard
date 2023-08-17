<?PHP
include("../header.php");
include("../db_connection/connection.php");
include("../constants.php");
include("./table_function.php");

if(isset($_GET['type']) && $_GET['type']=='delete'){
  
  
  $result=mysqli_query($con,"delete from algue where id ={$_GET['id']}");
  if($result){
    echo "<script>alert({$_GET['id']} is deleted)</script>";
  }
}
//skjdiaajid
?>



<div class="jumbotron">
<div class="d-flex justify-content-start">
  <a class="btn btn-outline-success mb-1" href="../Algae.php">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
</a></div>
<div class="table-responsive-sm">
<!-- Table -->
<?php  showTable("ague",$con,$ROOT)?>
 
</div>