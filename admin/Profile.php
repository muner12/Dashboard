<?PHP

include('header.php');
?>

<div class=" jumbotron d-flex justify-content-center">

    <div class="d-flex justify-content-center shadow-lg w-50 p-3 px-5 mb-5 bg-white border border-danger rounded">
        <div>
            <?PHP
            $row=mysqli_fetch_assoc(mysqli_query($con,"select * from admin where email='{$_SESSION['user']}'"));
        
            
            ?>
                <img class="rounded-circle  shadow-lg border border-danger " width="300" height="300" src="<?PHP echo "upload/user/".$row['image']?>" />
                <hr>
                <div>
            <table class="table mt-3 table-hover table-bordered table-condensed table-striped">
                <tr>
                    <td>Name</td>
                    <td><?PHP echo $row['name']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?PHP echo $row['email']?></td>
                </tr>
                <tr>
                <td>Contact</td>
                <td><?PHP echo $row['contact']?></td>
                </tr>
                <tr>
                <td>Role</td>
                <td><?PHP echo $row['role']?></td>
                </tr>
                <tr >
                 <td colspan="2" align="center"> <a  class="btn btn-success btn-block" href="editProfail.php?uemail=<?PHP echo sha1($_SESSION['user'])?>">Edit</a></td>
                </tr>
            </table>
        </div>
            </div>
        

    </div>
</div>



<?PHP 
include('footer.php')
?>

