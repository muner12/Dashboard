<?php 
include('header.php');


////// code
$error='';
$msg='';
$uemail=$_REQUEST['uemail'];

if(isset($_POST['update']))
{
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$phone=mysqli_real_escape_string($con,$_POST['contact']);


	
	
	$uemail=$_SESSION['user'];
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where email='$uemail'"));
	if($row['name']!=$name || $row['email']!=$email || $row['contact']!=$phone){
	if(!empty($name) && !empty($phone) && !empty($email))
	{
		
		$sql="update admin set name='$name', email='$email',contact='$phone' where email='$uemail'";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Profail updated Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Profail not Updated</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}else{
	$error = "<p class='alert alert-warning'>You cannot done any update!!!!!!!</p> ";
}
}								
?>

		
	
	

		<div class="container bg-light" align="center">

        <div CLASS="">
			
			<?PHP
            echo $msg;
		    echo $error;
		   
         if(isset($_GET['uemail'])){
             $q="select * from admin where uid=".$_SESSION['user'];

            if (isset($_GET['uemail']))
            {
            ?>
			<h3 align="center">Update Profile</h3>
			
			<div class="row ">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4">
					<div class="image_area">
						<form method="post">
							<label for="upload_image" class="">
                            <?PHP $row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where email='{$_SESSION['user']}'"))?>
								<img class="profail_img" src="<?PHP if(file_exists("upload/user/".$row['image'])) echo "upload/user/".$row['image'];?>" id="uploaded_image" style="border-radius:50%;" />
								<div class="overlay">
								    <div class="text">Click to Change Profile Image</div>
								</div>
			    				<input type="file" name="image" class="image" id="upload_image" style="display:none">
                              
			    			</label>
			    		</form>
			    	</div>
			    </div>
    	    	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="">
			            		<div class="row">
			                		<div class="col-sm-11 col-md-8">
			                    		<img src="" id="sample_image" height="300" width="300" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        		<button type="button" class="btn btn-primary" id="crop">Crop</button>
							<input type="hidden" id="uid" name="uid"  value="<?PHP echo $_SESSION['user']?>">
			      		</div>
			    	</div>
			  	</div>
                
			</div>	
              
		</div>
		<hr>
        <div class="row justify-content-center">
            <div class=" col-lg-5 col-md-5 col-sm-8 " >
                <div class="jumbotron">
                <form method="post">
                   
                    <div class="form-group ">
                      
                        <input class="form-control" type="text" name="name" require placeholder="Name"  value="<?PHP if(isset($row['name'])){echo $row['name'];}?>" />
                    </div>
                    <div class="form-group ">
                        <input class="form-control" type="email" name="email" require placeholder="Email" value="<?PHP if(isset($row['email'])){echo $row['email'];}?>" />
                    </div>
                    <div class="form-group ">
                        <input class="form-control" type="text" name="contact" require placeholder="phone" value="<?PHP if(isset($row['contact'])){echo $row['contact'];}?>"/>
                    </div>
                    <div class="form-group ">
                        <input class="btn btn-success" type="submit" name="update" value="update"/>
                    </div>
                </form>

                </div>
            </div>

        </div>
        </div>
        <?php } else{?>
            <div class="alert alert-danger text">This User name is Not Exist <a href="profile.php"> Back</a></div>
            <?PHP }
			}else{header("location:profile.php");
            }?>
        </div>
		</div>
	
<?PHP //include('footer.php');?>
<script>


	
	// function readURL(input)
	// {
  	// 	if(input.files && input.files[0])
  	// 	{
    // 		var reader = new FileReader();
    
	// 	    reader.onload = function(event) {
	// 	      	$('#uploaded_image').attr('src', event.target.result);
	// 	      	$('#uploaded_image').removeClass('img-circle');
	// 	      	$('#upload_image').after('<div align="center" id="crop_button_area"><br /><button type="button" class="btn btn-primary" id="crop">Crop</button></div>')
	// 	    }
	// 	    reader.readAsDataURL(input.files[0]); // convert to base64 string
  	// 	}
  	// }

  	// $("#upload_image").change(function() {
  	// 	//readURL(this);
	// 	  $("#upload_image").load();
  		
	// });
	
	var $modal = $('#modal');
	var image = document.getElementById('sample_image');
	var cropper;
	$('#imgshow').hide();
	$('#imgtxt').hide();
						
	
	$('#upload_image').change(function(event){
    	var files = event.target.files;
    	var done = function (url) {
      		image.src = url;
      		$modal.modal('show');
    	};
    	
    	if (files && files.length > 0)
    	{
      		
        		reader = new FileReader();
		        reader.onload = function (event) {
		          	done(reader.result);
		        };
        		reader.readAsDataURL(files[0]);
      		
    	}
	});

	$modal.on('shown.bs.modal', function() {
    	cropper = new Cropper(image, {
    		aspectRatio: 1,
    		viewMode: 3,
    		preview: '.preview'
    	});
	}).on('hidden.bs.modal', function() {
   		cropper.destroy();
   		cropper = null;
	});

	$("#crop").click(function(){
    	canvas = cropper.getCroppedCanvas({
      		width: 400,
      		height: 400,
    	});

    	canvas.toBlob(function(blob) {
        	
        	var reader = new FileReader();
         	reader.readAsDataURL(blob); 
         	reader.onloadend = function() {
            	var base64data = reader.result;  
            var uid=$("#uid").val();
            	$.ajax({
            		url: "upload.php",
                	method: "POST",                	
                	data: {image: base64data},
                	success: function(data){
                    	console.log(data);
                    	$modal.modal('hide');
                    	$('#uploaded_image').attr('src', data);
                    	//alert("success upload image");
						$('#imgshow').show();
						$('#imgshow').html("Your Image was uploaded successfully ");
						$('#imgtxt').show();

						setInterval(() => {

							
							location.reload();

						}, 1000);
						
						
                	}
              	});
         	}
    	});
    });
	

</script>

