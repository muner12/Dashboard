<?php

require("header.php");
require("db_connection/connection.php");
require('functions.php');


if(isset($_GET['id'])){
   $id=mysqli_real_escape_string($con,$_GET['id']);
   $type=mysqli_real_escape_string($con,$_GET['type']);;
if($type=='active'){
    $status=0;
}else{
    $status=1;
}
 mysqli_query($con,"update admin set status={$status} where id={$id}");
}



if(isset($_POST['add']))
{
   $email=$_POST['email'];
   $contact=$_POST['contact'];
   $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
   $role=$_POST['role'];

    if($email=='' ||$contact=='' || $password==''|| $role==''){
        echo '<script>alert("all Fields are Required!!!");</script>';
        
    }else{
        $sql="insert into admin(email,contact,password,role) values('$email','$contact','$password','$role')";

   $check_user=mysqli_query($con,"select * from admin where email='$email'");
   if(mysqli_num_rows($check_user)>0){
    echo '<script>alert("User already Registered");</script>';
   }else{
    $result=mysqli_query($con,$sql);
    if($result==1){
      echo '<script>alert("one User Registered");</script>';
    }
   }
   
    }
   
}



?>


<div class="jumbotron">
<?PHP if(isset($_GET['success'])){?>
<div class="alert alert-danger alert-dismissible">
  <button type="submit" class="close" data-dismiss="alert">&times;</button>
  <strong>One!</strong> Record deleted Successfully.
</div>
<?php } ?>
    <!-- Modal -->
<div class="d-flex justify-content-center text-success"><h3>Add Admin</h3></div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">add admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email"  placeholder="email"
                                    autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label for="name">Contact</label>
                                <input type="number" class="form-control" name="contact" placeholder="contact"
                                    autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label for="name">password</label>
                                <input type="password" class="form-control" name="password" 
                                    placeholder="password" autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label for="name">confirm password</label>
                                <input type="password" class="form-control" name="cpassword" 
                                    placeholder="password" autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label>Role </label>
                                <select class="form-control" name="role">
                                    <option>----Select</option>
                                    <option value="superAdmin">Super Admin</option>
                                    <option value="subAdmin">Sub Admin</option>
                                    <option value="user">User</option>

                                </select>
                            </div>
                            <div class="form-group">

                                <input type="submit" class="btn btn-success" name="add"  value="submit">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->


                </div>
            </div>
        </div>
    </div>
    <!-- model End -->



    <p class="text-danger"></p>
    <form method="post" class="center border">
        <div class="d-flex justify-content-start"><button type="button" class="btn btn-outline-success mb-1"
                data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> add admin
            </button></div>
        <div class="row">


            <!-- Table admin list -->
            <div class="w-100 col-lg-12 col-md-12 col-sm-12 col-xm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead class="bg-secondary">
                            <th>id</th>
                            <th>email</th>
                            <th>contact</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <thead>
                            <tbody>
                                <?php
                                    //define total number of results you want per page  
    $results_per_page = 10;  
  
    //find the total number of results stored in the database  
    $query = "select *from admin";  
    $result = mysqli_query($con, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) || $_GET['page']=="" ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  $path="addAdmin";
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM admin LIMIT " . $page_first_result . ',' . $results_per_page; 
    $tableName=encrypt("admin"); 
    $result = mysqli_query($con, $query);  
                                    while($row=mysqli_fetch_assoc($result)){
                                        if($_SESSION['user']==$row['email']){
                                            continue;
                                        }
                                        echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td >".$row['contact']."</td>";
                                        if($row['role']=='superAdmin'){
                                         echo "<td><button class='btn btn-sm btn-outline-success'>".$row['role']."</button></td>";
                                       
                                        }else if($row['role']=='subAdmin'){
                                            echo "<td><button class='btn btn-sm btn-outline-warning'>".$row['role']."</button></td>";
                                       
                                        }else{
                                            echo "<td><button class='btn btn-sm btn-outline-primary'>".$row['role']."</button></td>";
                                       
                                        }

                                        if($row['status']==0)
                                        {
                                            echo "<td><a class='btn btn-sm btn-outline-danger' href='?id={$row['id']}&type=deActive'><i class='fa fa-times' aria-hidden='true' data-toggle='tooltip' data-placement='right' title='DeActive'></i></a></td>";
                                        }
                                         
                                        else{
                                        echo "<td><a class='btn btn-sm btn-outline-success' href='?id={$row['id']}&type=active'><i class='fa fa-check' aria-hidden='true' data-toggle='tooltip' data-placement='right' title='Active'></i></a></td>";
                                        }
                                        echo "<td><a  href='delete.php?id={$row['id']}&path={$path}&table={$tableName}' class='btn btn-sm btn-outline-danger hidden2'>
                                        <i class='fa fa-trash'></i></a> </td>";
                                    }
                                ?>
                            </tbody>


                    </table>


                </div>
                <!-- pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item ">
                            <?PHP if($page>=2){?>
                            <a class="page-link" href="<?php echo "addAdmin.php?page=".$page-1; ?>"
                                tabindex="-1">Previous</a>
                            <?php  } ?>
                        </li>
                        <?php
                             for($i = 1; $i<= $number_of_page; $i++) {  
                                if($page==$i){
                                echo '<li class="page-item active"><a class="page-link" href = "addAdmin.php?page=' . $i . '">' . $i . ' </a></li>';  
                                }else{
                                    echo '<li class="page-item "><a class="page-link" href = "addAdmin.php?page=' . $i . '">' . $i . ' </a></li>';  
                                 
                                }
                            } 
                            ?>

                        <li class="page-item">
                            <?PHP if($page<$number_of_page){?>
                            <a class="page-link" href="<?php echo "addAdmin.php?page=".$page+1; ?>">Next</a>
                            <?PHP } ?>
                        </li>
                    </ul>
                </nav>
                <!-- pagination end -->

            </div>
        </div>

    </form>


</div>



<script>

$(".close").on("click",function(){
    window.location.href="addAdmin.php";
})

</script>

<?php
require("footer.php");

?>