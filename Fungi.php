<?php
    require("header.php");
    require("db_connection/connection.php");
    $msg='';

if(isset($_POST['insert'])){

    
  
    $botincal=$_POST['botanical'];
    $sysnonyams=$_POST['synonayms'];
    $family=$_POST['family'];
    $group=$_POST['group'];
   // $botincal=$_POST[''];
    $country=$_POST['contry'];
    $province=$_POST['province'];
    $collector=$_POST['Collector'];
    $collection_number=$_POST['Collection_Number'];
    $year=$_POST['Year'];
    $upload_date=$_POST['upload_date'];
    $desciption=$_POST['Description'];
   
    $picture_name=$_FILES['Picture']['name'];
    $picture_tempname=$_FILES['Picture']['tmp_name'];

    $check_recored=mysqli_query($con,"select * from fungi where botanical='$botincal'");
    if( mysqli_num_rows($check_recored)>0){
        echo '<script>alert("This Recored exist in the Database!!!")</script>';
    }else{

   
    $sql="INSERT INTO `fungi` ( `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) 
    VALUES ('$botincal', '$sysnonyams', '$family', '$group', '$country', '$province', '$collector', '$collection_number', '$year', '$upload_date', '$desciption', '$picture_name')";
   
   move_uploaded_file($picture_tempname,"upload/$picture_name");
    $result=mysqli_query($con,$sql);

if($result==1){
    
   
    echo '<script>alert("1 recored inserted Successfully!")</script>';
}
    }
}





?>

        <div class="container">
            <div class="jumbotron">
            <div class="roboto" ><h3 class="mb-5 text-success "> Add Fungi</h3></div> 
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-5">
                       
                            <div class="form-group">
                                <label for="name">Botinical Name</label>
                                <input type="text" class="form-control" id="name" name="botanical" placeholder="Botinical Name " required>
                            </div>
                            <div class="form-group">
                                <label for="name">Synonym</label>
                                <input type="text" class="form-control" id="name" name="synonayms" placeholder="Synonym" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Family</label>
                                <input type="text" class="form-control" id="name" name="family" placeholder="Family" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Group</label>
                                <input type="text" class="form-control" id="name" name="group" placeholder="Group" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Country</label>
                                <input type="text" class="form-control" id="name" name="contry" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Province</label>
                                <input type="text" class="form-control" id="name" name="province" placeholder="Province" required>
                            </div>
                           
                            <div class="form-group">
                                
                                <input type="submit" class="btn btn-success" id="name" name="insert" value="insert">
                            </div>
                            
                      
                    </div>
                    <div class="col-lg-5">
                    <div class="form-group">
                                <label for="name">Collector</label>
                                <input type="text" class="form-control" id="name" name="Collector" placeholder="Collector" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Collection_Number</label>
                                <input type="text" class="form-control" id="name" name="Collection_Number" placeholder="Collection_Number" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Year</label>
                                <input type="text" class="form-control" id="Name" name="Year" placeholder="Year" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Upload Date</label>
                                <input type="date" class="form-control" id="Upload_Date" name="upload_date" placeholder="Date" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="desc" name="Description" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Picture</label>
                                <input type="file" class="form-control" id="name" name="Picture" placeholder="" required>
                            </div>





                    </div>
                    
                </div>
                </form>
            </div>
        </div>

    <?php
    
    require("footer.php")?>