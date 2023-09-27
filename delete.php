<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("header.php");
include("functions.php");
if(isset($_GET['id']) || isset($_GET['speciesId'])  && isset($_GET['table']) && isset($_GET['path']) ){
    $path=isset($_GET['id'])?$_GET['path']:"tables/".$_GET['path'];

    $tableName=decrypt($_GET['table']);
   
    if(isset($_GET['id'])){
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from $tableName where id={$_GET['id']}"));

    }else{
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from $tableName where id={$_GET['speciesId']}"));

    }
if(isset($_POST['delete-btn'])){
    $id=isset($_GET['id'])?$_GET['id']:$_GET['speciesId'];

    $result=mysqli_query($con,"delete from $tableName where id={$id}");
    //echo "<script>location.replace($path.'.php?success=yes')</script>";
    echo '<script>window.location.href = "' . $path . '.php?success=yes";</script>';
    exit(); // Ensure that no further code execution occurs
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
                    Are You Sure To Delete <strong>'<?PHP if(isset($_GET['id'])){
                        echo  $row['email'];
                    }else echo $row['botanical']?>'</strong>
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
    let a=<?PHP echo "\"".strval($path)."\"";?>
   
    $("#cancle").on("click",function(){
        window.location.href=a+".php";
    });
    $(".close").on("click",function(){
        window.location.href=a+".php";
    });
    </script>

<?php
}else{
    echo "<div class='d-flex text-danger mt-5 p-5  justify-content-center align-item-center'><p class=''>Something went to wrong!!!!!!<p></div>";
}
include("footer.php")
?>