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

    $check_recored=mysqli_query($con,"select * from algue where botanical='$botincal'");
    if( mysqli_num_rows($check_recored)>0){
        echo '<script>alert("This Recored exist in the Database!!!")</script>';
    }else{

   
    $sql="INSERT INTO `algue` ( `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) 
    VALUES ('$botincal', '$sysnonyams', '$family', '$group', '$country', '$province', '$collector', '$collection_number', '$year', '$upload_date', '$desciption', '$picture_name')";
    move_uploaded_file($picture_tempname,"upload/algae/$picture_name");
    $result=mysqli_query($con,$sql);

if($result==1){
    
   
    echo '<script>alert("1 recored inserted Successfully!")</script>';
}
    }
}

//end insert

// --------------------------------------------------------------//

//
$fetch_one_row=[];
if(isset($_GET['type']) && $_GET['type']=='update'){
    $fetch_one_row=mysqli_fetch_assoc(mysqli_query($con,"select * from algue where id={$_GET['id']}"));
   
   
}






?>

<div class="container">
   
    <div class="jumbotron">
         <!-- bread crumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">
                   <?PHP if($update_text=="update") { ?> <a>update Algae</a><?php } else { ?>
                    <a>Add Algae</a><?PHP }?>
                </li>
                
            </ol>
        </nav>
        <!-- end bread Crumb -->
        <div class="roboto d-flex justify-content-center">
            <h2 class="mb-5 text-success "><?PHP if($update_text=="update") { ?> <a>Update Algae</a><?php } else { ?>
                    <a>Add Algae</a><?PHP }?></h3>
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

                    <div class="form-group">

                        <input type="submit" class="btn btn-success" id="name" name="insert" value="insert">
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
                        <input type="file" class="form-control" id="name" name="Picture" placeholder="" required>
                    </div>





                </div>

            </div>
        </form>
    </div>
</div>

<?php
    
    require("footer.php")?>