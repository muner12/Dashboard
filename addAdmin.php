
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
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <input type="email" class="form-control" name="email" id="name" placeholder="email"  autocomplete="off" >
                  
                      </div>
                      <div class="form-group">
                          <label for="name">Contact</label>
                          <input type="number" class="form-control" name="contact" id="name" placeholder="contact"  autocomplete="off" >
                  
                      </div>
                      <div class="form-group">
                          <label for="name">password</label>
                          <input type="password" class="form-control" name="password" id="name" placeholder="password"  autocomplete="off" >
                          
                      </div>
                      <div class="form-group">
                          <label for="name">confirm password</label>
                          <input type="password" class="form-control" name="cpassword" id="name" placeholder="password"  autocomplete="off" >
                          
                      </div>
                      <div class="form-group">
                          <label>Role </label>
                          <select class="form-control" name="role" >
                              <option>----Select</option>
                              <option value="superAdmin">Super Admin</option>
                              <option value="subAdmin">Sub Admin</option>
                              <option value="user">User</option>
                  
                          </select>
                      </div>
                      <div class="form-group">
                          
                          <input type="submit" class="btn btn-success" name="add" id="name" value="submit" >
                          
                      </div>
                      </div>
</form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <input type="submit" class="btn btn-success" name="add" id="name" value="submit" >
                         
                    </div>
                    </div>
                </div>
                </div>
                <!-- model End -->



                <p class="text-danger"></p>
                <form method="post" class="center border"  >
                    <div class="d-flex justify-content-end"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> add admin 
</button></div>
                    <div class="row">
                    
                
                    <!-- Table admin list -->
                    <div class="w-75 col-lg-12 col-md-6">
                        <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>id</th>
                                <th>email</th>
                                <th>contact</th>
                                <th>Role</th>
                                <th>Status</th>
                            <thead>
                            <tbody>
                                <?php
                                    $sql="select * from admin";
                                    $list=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_assoc($list)){
                                        echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td>".$row['contact']."</td>";
                                        if($row['role']=='superAdmin'){
                                         echo "<td><button class='btn btn-sm btn-success'>".$row['role']."</button></td>";
                                       
                                        }else if($row['role']=='subAdmin'){
                                            echo "<td><button class='btn btn-sm btn-warning'>".$row['role']."</button></td>";
                                       
                                        }else{
                                            echo "<td><button class='btn btn-sm btn-primary'>".$row['role']."</button></td>";
                                       
                                        }

                                        if($row['status']==0)
                                        {
                                            echo "<td><a <a class='btn btn-danger' href='?id={$row['id']}&type=deActive'>DeActive</a></td>";
                                        }
                                         
                                        else{
                                        echo "<td><a class='btn btn-success' href='?id={$row['id']}&type=active'>Active</a></td>";
                                        }
                                    }
                                ?>
                            </tbody>
                                
                        </table>
                                </div>
                    </div>
                    </div>
                   
                </form>
            
        
    </div>




<?php
require("footer.php");
?>

   