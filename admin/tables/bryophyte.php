<?PHP
include("../header.php");
include("../db_connection/connection.php");
include("../constants.php");
include("./table_function.php");

if(isset($_GET['type']) && $_GET['type']=='delete'){
  
  
  $result=mysqli_query($con,"delete from bryophytes where id ={$_GET['id']}");
  if($result){
    echo "<script>alert({$_GET['id']} is deleted)</script>";
  }
}

?>


<?php showTable("bryophytes",$con,$ROOT,"bryophyte")?>

<?php
include("../footer.php");
?>