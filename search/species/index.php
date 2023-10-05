<?Php



?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Herbarium Catalogue (S) -- Search genus/species</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128363340-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-128363340-1', { 'anonymize_ip': true });
	</script>
	<link rel="stylesheet" href="../../static/kryptos/css/bootstrap-3.4.1.min.eb2644c7646f.css">
    
<link rel="stylesheet" type="text/css" href="../../static/kryptos/css/datatables.min.e91bc205a718.css"/>
<style type="text/css">
.dataTables_info { padding-top: 0px !important;}
</style>

    <link rel="stylesheet" href="../../static/kryptos/css/kryptos.96ff8b763cb6.css">
    <link rel='shortcut icon' type='image/x-icon' href='../../static/kryptos/img/Icon/icon.jpg' />
  </head>
 <body background="../../static/kryptos/img/bakgrund.cd326a1e709c.png"> 
  	<div id="body-container" class="container">
    <header> 
        <a href="https://www.ubuner.edu.pk/course/botany/" class="nrm"><img src="../../static/kryptos/img/Logo/logo.png" alt="NRM logotype"/></a>
        <h1><a href="../../index.html">University of Buner Herbarium Catalog Collection</a></h1>    
    </header>
    <nav class="clearfix nav-species">
    	<a class="menu visible-xs-block" href="#">Navigation <span class="pull-right">&#9776;</span></a>
        <a class="link nav-start" href="../../index.html">Start</a>
  		<a class="link nav-items" href="../specimens/index.html">Search specimens</a>
  		<a class="link nav-species" href="index.html">Search genus/species</a>
  		<a class="link nav-howto" href="../../howto/index.html">How-to</a>
      
    </nav>
      
      

<div class="well well-sm">
	<form>
		<div class="row">
    		<div class="col-md-9 col-sm-12">
    			<div class="form-group">
    				<label for="query">Search genus/species</label>
    				<input type="text" name="query" class="form-control" id="query" value="" autofocus/>
    			</div>   				
      		</div>
			<div class="col-md-3 col-sm-12 label-pad">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
				<a class="btn btn-link pull-right" href="index.html" role="button"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Reset</a>
			</div>
	  	</div>
	  	<div class="row">
	  		<div class="col-lg-9">
				<label class="checkbox-inline">
					<input type="checkbox" id="nosyn" name="nosyn" value="true" />Exclude synonyms
				</label>
			</div>
	  	</div>
	</form>
</div>

<div id="datatables_error" class="row collapse">
	<div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10">
		<div class="alert alert-danger" role="alert">
			<strong>Error:</strong> There was an error while performing the search <span class="details"></span>
		</div>
	</div>
</div>




    <footer>
    	<ul class="list-inline text-center">
    		<li><a href="mailto:herbarium@nrm.se/">herbarium@nrm.se</a></li>
    	</ul>          
        <ul class="list-inline text-center">          
          <li><a href="http://www.nrm.se/english/themuseum/contact/">Contact</a></li>
          <li><a href="http://www.nrm.se/english/visitthemuseum/">Visit the museum</a></li>
          <li><a href="http://www.nrm.se/english/researchandcollections/">Research and collections</a></li>
          <li><a href="../../gdpr/index.html">Processing of personal data</a></li>
          <li><a href="../../accessibility/index1.html">Accessibility</a></li>
        </ul>
    </footer>
    </div>
    <script src="../../static/kryptos/js/jquery-3.6.0.min.8fb8fee4fcc3.js"></script>
    <script src="../../static/kryptos/js/bootstrap-3.4.1.min.2f34b630ffe3.js"></script>
    <script src="../../static/kryptos/js/kryptos.134b4c7884dd.js"></script>
    
<script type="text/javascript" src="../../static/kryptos/js/datatables.min.e8e1e8eb568d.js"></script>
<script type="text/javascript">
$.fn.DataTable.ext.pager.full_numbers_no_ellipses = function(page, pages){
    var numbers = [];
    var buttons = $.fn.DataTable.ext.pager.numbers_length;
    var half = Math.floor( buttons / 2 );
    var _range = function ( len, start ){
       var end;

       if ( typeof start === "undefined" ){
          start = 0;
          end = len;
       } else {
          end = start;
          start = len;
       }
       var out = [];
       for ( var i = start ; i < end; i++ ){ out.push(i); }
       return out;
    };
    if ( pages <= buttons ) {
       numbers = _range( 0, pages );
    } else if ( page <= half ) {
      numbers = _range( 0, buttons);
    } else if ( page >= pages - 1 - half ) {
       numbers = _range( pages - buttons, pages );
    } else {
       numbers = _range( page - half, page + half + 1);
    }
    numbers.DT_el = 'span';
    return [ 'first', 'previous', numbers, 'next', 'last' ];
};

$.fn.dataTable.ext.errMode = 'none';

$(document).ready(function() {
	$("#datatables_error").collapse({
		toggle: false,
	});
	$('#result')
		.on("xhr.dt", function( e, settings, json, xhr) {
			xhr.fail(function(jqXHR, textStatus, errorThrown) {
				$("#datatables_error .details").text("(" + jqXHR.status + " " + jqXHR.statusText + ")");
			});
		})
		.on("error.dt", function ( e, settings, techNote, message ) {
			$("#datatables_error").collapse("show");
	        console.log('An error has been reported by DataTables: ', message );
	    })
	    .dataTable( {
		"processing": true,
        "serverSide": true,
        "searching": false,
        "responsive": true,
        "stateSave": true,
        "dom": '<"panel panel-default"<"panel-heading"<"row"<"col-sm-6 lh30"i><"col-sm-6 text-right"l>>>r<"row"<"col-sm-12"t>><"panel-footer"<"row"<"col-sm-12 text-right"p>>>>',
        "ajax": {
        	"url": "/search/species/data/",
        	"data": function (d) {
        		d.query = $("#query").val();
        		d.nosyn = $("#nosyn").prop("checked");        		
        	}
        },
        "language": {
        	"infoFiltered": "(of _MAX_ entries in total)"
        },
        "pagingType": "full_numbers_no_ellipses",
        "order": [[0, "asc"]],
        "columns": [
            { "data": "namn",
              "render": function ( data, type, row, meta ) {
           		  return '<a href="'+row.url+'">'+data+' '+row.auktor+'</a>'; 
           	  }
            },
            { "data": "familj"}
        ]
    } );
	$("form").submit(function() {
		// Reset saved state when form is submitted
		if (typeof(Storage) !== "undefined") {
    		localStorage.setItem("DataTables_result_" + window.location.pathname, "{}");
		}
	});
} );
</script>
<script src="js/form.js"></script>


  </body>

</html>
