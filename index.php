<?php
$con=mysqli_connect("localhost","root","","botony");
$total_species=0;
function percent($register,$total){

	$percent=($register/$total)*100;

	return round($percent,2).'%';
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University of Buner Herbarium Catalog</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128363340-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-128363340-1', { 'anonymize_ip': true });
	</script>
	<link rel="stylesheet" href="static/kryptos/css/bootstrap-3.4.1.min.eb2644c7646f.css">
    
<style type="text/css">
.dataTables_info { padding-top: 0px !important;}

</style>

    <link rel="stylesheet" href="static/kryptos/css/kryptos.96ff8b763cb6.css">
    <link rel='shortcut icon' type='image/x-icon' href='static/kryptos/img/Icon/icon.jpg' />
  </head>
 <body background="static/kryptos/img/bakgrund.cd326a1e709c.png"> 
  	<div id="body-container" class="container">
    <header> 

        <a href="https://www.ubuner.edu.pk/course/botany" class="nrm"> <img src="static/kryptos/img/Logo/logo.png" alt="NRM logotype"/></a>
        <h1><a href="index.html">University of Buner Herbarium Catalog</a></h1>
    </header>
    <nav class="clearfix nav-start">
    	<a class="menu visible-xs-block" href="#">Navigation <span class="pull-right">&#9776;</span></a>
        <a class="link nav-start" href="index.php">Start</a>
  		<a class="link nav-items" href="search/specimens/index.html">Search specimens</a>
  		<a class="link nav-species" href="search/species/index.html">Search genus/species</a>
  		<a class="link nav-howto" href="howto/index.html">How-to</a>
		
		

    </nav>
      
      
<div class="row">
	<div class="col-lg-10" style="padding-top: 10px" >
		 <h4>Welcome to the online Herbarium database of the Department of Botany, University of Buner, Pakistan.This herbarium Providing information about the species of Algae, Fungi, Lichens, Bryophytes, Pteridophytes, Gymnosperms and Angiosperms. </h4>
	</div>
</div>

<div class="row">
	<div class="col-lg-10" style="padding-top: 10px" >
		<div class="alert alert-danger" role="alert">	
			<p class="lead"><h4>The botanical collections at the Herbarium Department of Botany are from October 2022 and for at least seven years unavailable for loans and visits.</h4></p> 
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-10" style="padding-top: 10px" >
		<p class="lead"><h4>During the time of the extensive renovations of the botany building, the botanical collections as stored ex-situ. Please feel free to contact us at herbarium@ubuner.edu.pk for further information or if you have any questions. 

			</h4></div>
			</div>
			

<div class="row" style="padding-top :50px">
	<div class="col-lg-8 col-md-10">
		<div class="table-responsive">
		<table class="table table-striped text-right">
			<thead>
				<tr>   
					<th></th>
					<th class="text-right">Total number</th>
					<th class="text-right">Registered</th>
					<th class="text-right">Proportion</th>
					<th class="text-right">Types registered</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row" class="text-right">Fungi and lichens</th>
					<td class="text-right">
					<?PHP
						$row=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(total_count) AS total_rows
						FROM (
							SELECT COUNT(*) AS total_count
							FROM fungi
							UNION ALL
							SELECT COUNT(*) AS total_count
							FROM lichens
						) AS subquery;
						
						"));
						echo $row['total_rows'];
						$total_species+=$row['total_rows'];
						?>
					</td>
					<td class="text-right">
						
						0
					
					</td>
					<td class="text-right">0<?PHP// echo percent($row['total_rows'],67000);?></td>
					<td>0</td>
				</tr>
				<tr>
					<th scope="row" class="text-right">Algae</th>
					<td class="text-right"><?PHP 
					$row=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from algue "));
					echo $row['count'];
					$total_species+=$row['count'];
					?></td>
					<td class="text-right">0</td>
					<td class="text-right">0</td>
					<td>0</td>
				</tr>
				<tr>
					<th scope="row" class="text-right">Bryophytes</th>
					<td class="text-right"><?PHP 
					$row=mysqli_fetch_assoc(mysqli_query($con,"select count(botanical) as count from bryophytes "));
					echo $row['count'];
					$total_species+=$row['count'];
					?></td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
				</tr>
				<tr>
					<th scope="row" class="text-right">Vascular plants</th>
					<td><?PHP
					$row=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(total_count) AS total_rows
					FROM (
						SELECT COUNT(*) AS total_count
						FROM angiosperms
						UNION ALL
						SELECT COUNT(*) AS total_count
						FROM gymnosperms
						UNION ALL
						SELECT COUNT(*) AS total_count
						FROM pteridophytes
					) AS subquery;
					
					"));
					echo $row['total_rows'];
					$total_species+=$row['total_rows'];
					?></td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
				</tr>
				
			
				<tr>
					<th scope="row" class="text-right">Total</th>
					<th class="text-right"><?php echo $total_species;?></th>
					<th class="text-right">0</th>
					<th class="text-right">0</th>
					<th class="text-right">0</th>
				</tr>
			</tbody>
		</table>
		</div>
		<?PHP
		$date=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(latest_date) AS latest_date
		FROM (
			SELECT MAX(upload_date) AS latest_date FROM algue
			UNION ALL
			SELECT MAX(upload_date) AS latest_date FROM fungi
			UNION ALL
			SELECT MAX(upload_date) AS latest_date FROM lichens
			UNION ALL
			SELECT MAX(upload_date) AS latest_date FROM gymnosperms
			UNION ALL
			SELECT MAX(upload_date) AS latest_date FROM angiosperms
			UNION ALL
			SELECT MAX(upload_date) AS latest_date FROM pteridophytes
		) AS subquery;
		"));
		?>
		<p class="text-muted text-right">Information updated <?PHP echo $date['latest_date'];?></p>
	</div>
</div> 


    <footer>
    	<ul class="list-inline text-center">
    		<li><a href="mailto:herbarium@ubuner.edu.pk">herbarium@ubuner.edu.pk</a></li>
    	</ul>          
        <ul class="list-inline text-center">          
          
          <li><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <!-- Add font awesome icons -->
          <li><a href="https://www.facebook.com/rahmanullah0966?mibextid=ZbWKwL" class="fa fa-facebook"></a></li>
          <li><a href="https://twitter.com/RahmanU01226335/status" class="fa fa-twitter"></a></li>
		  <li><a href="#" class="fa fa-google"></a></li>
		  <li><a href="#" class="fa fa-linkedin"></a></li>
		  <li><a href="https://instagram.com/rahmanullah0966?igshid=NGVhN2U2NjQ0Yg==" class="fa fa-instagram"></a></li><br>
		  <span style="color: white;"> © 2023 UOB Herbarium Catalog. All Rights Reserved</span>
		  
        </ul>
		
    </footer>
    </div>
    <script src="static/kryptos/js/jquery-3.6.0.min.8fb8fee4fcc3.js"></script>
    <script src="static/kryptos/js/bootstrap-3.4.1.min.2f34b630ffe3.js"></script>
    
	 </script>
    
  </body>


</html>
