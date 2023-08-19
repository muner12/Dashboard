
<?php

require("header.php");



$total_algee=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from algue"));
$total_fungi=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from fungi"));
$total_angiosperm=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from angiosperms"));
$total_gymnosperm=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from gymnosperms"));
$total_gymnosperm=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from bryophytes"));
$total_gymnosperm=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from pteridophytes"));
$total_gymnosperm=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from lichens"));
?>
<div class="jumbotron">
    <div class="row d-flex justify-content-center">

        <!-- Algae -->

    <div class="card border-primary mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">Algae</div>
  <div class="card-body">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-primary"><?PHP echo $total_algee['count']?></span></div>
    
    <div class="d-flex mt-5">
        <a class="btn btn-sm btn-primary" href="tables/algae.php">View More</a>
    </div>
  </div>
</div>

        <!-- Algae End -->

        <!-- Fungi -->
    <div class="card border-secondary mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">Fungi</div>
  <div class="card-body text-secondary">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-secondary"><?PHP echo $total_fungi['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-secondary" href="tables/fungi.php">View More</a>
    </div> 
</div>
</div>
        <!-- End Fungi -->

        <!-- Angiosperm -->
        <div class="card border-success mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">Angiosperm</div>
  <div class="card-body text-success">

  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-success"><?PHP echo $total_angiosperm['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-success" href="tables/angiosperm.php">View More</a>
    </div> 
    </div>
</div>
        <!-- End   Angiosperm-->

</div>
<!-- end row -->

<div class="row d-flex justify-content-center">
<!-- gymnosperm -->
<div class="card border-danger mb-3 col-lg-3 m-3 " style="max-width: 21rem;">
  <div class="card-header">gemnosperm</div>
  <div class="card-body text-danger">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-danger"><?PHP echo $total_gymnosperm['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-danger" href="tables/gymnosperms.php">View More</a>
    </div> 
  </div>
</div>
<!-- End gymnosperm -->

<!-- bryophytes -->
<div class="card border-warning mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">bryophytes</div>
  <div class="card-body text-warning">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-danger"><?PHP echo $total_gymnosperm['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-warning" href="tables/bryophytes.php">View More</a>
</div>
  
</div>
</div>
<!-- End bryophytes  -->

<!--pteridophytes  -->
<div class="card border-info mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">pteridophytes</div>
  <div class="card-body text-info">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-danger"><?PHP echo $total_gymnosperm['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-info" href="tables/pteridophytes.php">View More</a>
  </div>
  </div>
</div>
<!-- End pteridophytes  -->
</div>
<!-- end row -->

<div class="row d-flex justify-content-center">
    <!-- lichens -->
<div class="card border-dark mb-3 col-lg-3 m-3" style="max-width: 21rem;">
  <div class="card-header">lichens</div>
  <div class="card-body text-dark">
  <div class=" d-flex justify-content-between"><span>Total Species:</span><span class="badge badge-pill badge-danger"><?PHP echo $total_gymnosperm['count']?></span></div>
  <div class="d-flex mt-5">
        <a class="btn btn-sm btn-dark" href="tables/lichens.php">View More</a>
  </div>
</div>
<!--End lichens  -->
<div>
    <!--  -->
</div>


</div>
</div>
<?php
require("footer.php");
?>

   