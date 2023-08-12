<?PHP
include("../header.php");
include("../db_connection/connection.php");
include("../constants.php");

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
<table class="table table-hover table-striped table-bordered">
    <thead class="bg-secondary">
            <th>id</th>
            <th>Botinical Name</th>
            <th>synonyams</th>
            <th>family</th>
            <th>country</th>
            <th>province</th>
            <th>collector</th>
            <th>collection_number</th>
            <th>year</th>
            <th>Image</th>
            <th colspan="2" style="text-align:center">Actions</th>
           

    <thead>
    <?php
    $sql="select * from algue ";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>

        <td>".$row['id']."</td>
        <td>".$row['botanical']."</td>
        <td>".$row['synonyams']."</td>
        <td>".$row['family']."</td>
        <td>".$row['country']."</td>
        <td>".$row['province']."</td>
        <td>".$row['collector']."</td>
        <td>".$row['collection_number']."</td>
        <td>".$row['year']."</td>
        <td><img width='50px' height='35px' src='../upload/algae/{$row['picture']}'></td>
        <td> <a class='btn btn-sm btn-danger' href='?id={$row['id']}&type=delete'>Delete</a></td>
        <td><a class='btn btn-sm btn-primary' href='{$ROOT}/Algae.php?id={$row['id']}&type=update'>Edit</a></td>
        </tr>";
    }

    ?>
    <tbody>

</tbody>
</table>
  </table>
</div>