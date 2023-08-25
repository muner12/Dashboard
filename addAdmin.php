<?php

require("header.php");
require("db_connection/connection.php");



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



    <!-- Modal -->

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
    <!-- Delete Modal  -->
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Alert Box <span class=""><i
                                class="fa fa-exclamation-triangle" aria-hidden="true"></i></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure To Delete
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                    <form><button type="submit" class="btn btn-sm btn-outline-danger">Delete</button></form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal End for Delete confirmation -->



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
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM admin LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($con, $query);  
                                    while($row=mysqli_fetch_assoc($result)){
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
                                        echo "<td>
                                        <input type='hidden' id='id{$row['id']}'  class='hidden1' name='deleteID' value='{$row['id']}' >
                                        <a  class=' class_{$row['id'] } btn btn-sm btn-outline-danger hidden2' data-toggle='modal' data-target='#exampleModalCenter1'>
                                        <i class='fa fa-trash' aria-hidden='true'></i></a> </td>";
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



</script>

<?php
require("footer.php");

?>