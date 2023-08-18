<?php
    require("header.php");
    require("db_connection/connection.php");
    $msg='';
    $update_text="";
    if(isset($_GET['type'])&& $_GET['type']=="update" ){
        $update_text="update";
    }
//insert
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
    $desciption=mysqli_real_escape_string($con,$_POST['Description']);
   
    $picture_name=$_FILES['Picture']['name'];
    $picture_tempname=$_FILES['Picture']['tmp_name'];

    $check_recored=mysqli_query($con,"select * lichens where botanical='$botincal'");
    if( mysqli_num_rows($check_recored)>0){
        echo '<script>alert("This Recored exist in the Database!!!")</script>';
    }else{

   
    $sql="INSERT INTO `lichens` ( `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) 
    VALUES ('$botincal', '$sysnonyams', '$family', '$group', '$country', '$province', '$collector', '$collection_number', '$year', '$upload_date', '$desciption', '$picture_name')";
    move_uploaded_file($picture_tempname,"upload/lichens/$picture_name");
    $result=mysqli_query($con,$sql);

if($result==1){
    
   
    echo '<script>alert("1 recored inserted Successfully!")</script>';
}
    }
}

//end insert

// --------------------------------------------------------------//

//
$required="required";
if(isset($_GET['type']) && $_GET['type']=='update'){
    $required="";
}

$fetch_one_row=[];
if(isset($_GET['type']) && $_GET['type']=='update'){
    $fetch_one_row=mysqli_fetch_assoc(mysqli_query($con,"select * from lichens where id={$_GET['id']}"));
   
   
}
$db_picture="";
if(isset($fetch_one_row['picture'])){
    $db_picture=$fetch_one_row['picture'];
}


//update


if(isset($_POST['update'])){
    
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
    $desciption=mysqli_real_escape_string($con,$_POST['Description']);
   
  
    
    if(isset($_FILES['Picture']['name']) && strlen($_FILES['Picture']['name'])>0){
        $picture_name=$_FILES['Picture']['name'];
        
        $picture_tempname=$_FILES['Picture']['tmp_name'];
        move_uploaded_file($picture_tempname,"upload/lichens/$picture_name");
    }else{
        $picture_name=$db_picture;
       
        
    }
   
    $sql="UPDATE `lichens` SET `botanical` = '$botincal', `synonyams` = '$sysnonyams',
     `family` = '$family', `group` = '$group', `country` = '$country',
      `province` = '$province', `collector` = '$collector', `collection_number` = '$collection_number', `year` = '$year',
       `upload_date` = '$upload_date', `description` = '$desciption',
        `picture` = '$picture_name' WHERE `lichens`.`id` = {$_GET['id']}";
        $result=mysqli_query($con,$sql);

       
       

if($result==1){
    
   
    echo '<script>alert("1 recored updated Successfully!")</script>';
    
}
    }









?>

<div class="container">
   
    <div class="jumbotron">
         <!-- bread crumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">
                   <?PHP if($update_text=="update") { ?> <a>update gymnosperms</a><?php } else { ?>
                    <a>Add gymnosperms</a><?PHP }?>
                </li>
                
            </ol>
        </nav>
        <!-- end bread Crumb -->
        <div class="roboto d-flex justify-content-center">
            <h2 class="mb-5 text-success "><?PHP if($update_text=="update") { ?> <a>Update lichens</a><?php } else { ?>
                    <a>Add lichens</a><?PHP }?></h3>
        </div>
        <form method="post" enctype="multipart/form-data">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-5">

                    <div class="form-group">
                        <label for="name">Botanical Name</label>
                        <input value="<?PHP if(isset($fetch_one_row['botanical'])) echo $fetch_one_row['botanical'];?>" value="<?PHP if(isset($fetch_one_row['botanical'])) echo $fetch_one_row['botanical'];?>" type="text" class="form-control" id="name" name="botanical" placeholder="botanical Name "
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Synonym</label>
                        <input value="<?PHP if(isset($fetch_one_row['synonyams'])) echo $fetch_one_row['synonyams'];?>" type="text" class="form-control" id="name" name="synonayms" placeholder="Synonym"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Family</label>
                        <input value="<?PHP if(isset($fetch_one_row['family'])) echo $fetch_one_row['family'];?>" type="text" class="form-control" id="name" name="family" placeholder="Family" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Group</label>
                        <input value="<?PHP if(isset($fetch_one_row['group'])) echo $fetch_one_row['group'];?>" type="text" class="form-control" id="name" name="group" placeholder="Group" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Country</label>
                        <input value="<?PHP if(isset($fetch_one_row['country'])) echo $fetch_one_row['country'];?>" type="text" class="form-control" id="name" name="contry" placeholder="Country" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Province</label>
                        <input value="<?PHP if(isset($fetch_one_row['province'])) echo $fetch_one_row['province'];?>" type="text" class="form-control" id="name" name="province" placeholder="Province"
                            required>
                    </div>

                    


                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="name">Collector</label>
                        <input value="<?PHP if(isset($fetch_one_row['collector'])) echo $fetch_one_row['collector'];?>" type="text" class="form-control" id="name" name="Collector" placeholder="Collector"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Collection_Number</label>
                        <input value="<?PHP if(isset($fetch_one_row['collection_number'])) echo $fetch_one_row['collection_number'];?>" type="text" class="form-control" id="name" name="Collection_Number"
                            placeholder="Collection_Number" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Year</label>
                        <input value="<?PHP if(isset($fetch_one_row['year'])) echo $fetch_one_row['year'];?>" type="text" class="form-control" id="Name" name="Year" placeholder="Year" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Upload Date</label>
                        <input value="<?PHP if(isset($fetch_one_row['upload_date'])) echo $fetch_one_row['upload_date'];?>" type="date" class="form-control" id="Upload_Date" name="upload_date" placeholder="Date"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input value="<?PHP if(isset($fetch_one_row['description'])) echo $fetch_one_row['description'];?>" type="text" class="form-control" id="desc" name="Description" placeholder="Description"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Picture</label>
                        <input  type="file" class="form-control" id="name" name="Picture" placeholder="" <?php echo $required;?>>
                    </div>





                </div>
                

            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5">
                <div class="form-group">
                        <?PHP if(isset($_GET['type']) && $_GET['type']=='update'){?>
                        <input type="submit" class="btn btn-success btn-block" id="name" name="update" value="update">
                        <?PHP } else { ?>
                            <input type="submit" class="btn btn-success btn-block" id="name" name="insert" value="insert">
                       <?php }?>
                    </div>
      
                </div>
                <div class="col-lg-5">
                    
                    <?php
                    if(isset($_GET['type']) && $_GET['type']=='update'){
                        echo "<img width='100px' height='60px' src='upload/lichens/{$fetch_one_row['picture']}'>";
                    
                    
                    ?>
                    <span class="text-danger" style="font-size:10px;">Note:If You not select Image, by default this picture wil be selected<span>
                    <?php } ?>
                        </div>
            </div>
            
             </form>
    </div>
</div>

<?php
    
    require("footer.php")?>