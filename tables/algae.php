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


<?php showTable("algue",$con,$ROOT,"algae")?>

<?php
include("../footer.php");
?>