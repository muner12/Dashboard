<?PHP

include("header.php");

if(isset($_GET['adminId']) ){
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where id={$_GET['adminId']}"));
if(isset($_POST['delete-btn'])){
    $id=$_GET['adminId'];
    $result=mysqli_query($con,"delete from admin where id={$id}");
    header("location:addAdmin.php?success=yes");
}


?>
<div class="" style="margin-top:600px;">


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
                    Are You Sure To Delete <strong>'<?PHP echo $row['email'];?>'</strong>
                </div>
                <div class="modal-footer">
                    <button type="button"  id="cancle" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                    <form method="post" ><button type="submit" name="delete-btn" class="btn btn-sm btn-outline-danger">Delete</button></form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal End for Delete confirmation -->

</div>
<script>
    $("#exampleModalCenter1").modal("show");
    $("#cancle").on("click",function(){
        window.location.href="addAdmin.php";
    });
    $(".close").on("click",function(){
        window.location.href="addAdmin.php";
    });
    </script>

<?php
}else{
    echo "<div class='d-flex text-danger mt-5 p-5  justify-content-center align-item-center'><p class=''>Something went to wrong!!!!!!<p></div>";
}
include("footer.php")
?>