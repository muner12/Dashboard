
<?php

require("header.php");

$total_algee=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from algue"));

?>
<div class="jumbotron">
    <div class="row d-flex justify-content-center">

        <!-- Algae -->

    <div class="card border-primary mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Algae</div>
  <div class="card-body">
  <div class=" card-header d-flex justify-content-between"><span>Total spechies:</span><span class="badge badge-pill badge-primary"><?PHP echo $total_algee['count']?></span></div>
    
    <div class="d-flex">
        <a class="btn btn-sm btn-success" href="tables/algae.php">View More</a>
    </div>
  </div>
</div>

        <!-- Algae End -->

        <!-- Fungi -->
    <div class="card border-secondary mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
        <!-- End Fungi -->

        <!-- Angiosperm -->
        <div class="card border-success mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
        <!-- End   Angiosperm-->

</div>
<!-- end row -->

<div class="row d-flex justify-content-center">
<!-- gemnosperm -->
<div class="card border-danger mb-3 col-lg-3 m-3 " style="max-width: 18rem;">
  <div class="card-header">gemnosperm</div>
  <div class="card-body text-danger">
    <h5 class="card-title">Danger card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<!-- End gemnosperm -->

<!--  -->
<div class="card border-warning mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-warning">
    <h5 class="card-title">Warning card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<!--  -->
<!--  -->
<div class="card border-info mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-info">
    <h5 class="card-title">Info card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<!--  -->
</div>
<!-- end row -->

<div class="row d-flex justify-content-center">
    <!--  -->
<div class="card border-dark mb-3 col-lg-3 m-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Dark card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<!--  -->
<div>
    <!--  -->
</div>



<?php
require("footer.php");
?>

   