<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	
	<!-- Immagini -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	
    <title>Spider</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
	$(document).ready(function() {

		$("#aggiungi2").click(function(){

			var dominio = $("#dominio").val();
			var url = $("#url").val();

			$.ajax({
				type: "POST",
				url: "add-address.php",
				data: "dominio=" + dominio + "&url=" + url,
				dataType: "html",
				success: function(msg) {
					$("#dominio").val('');
					$("#url").val('');
				},
				error: function() {
					alert("Chiamata fallita, si prega di riprovare...");
				}
			});
			
		});
		
	});
	</script>
</head>
<body>
    <div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation"><a href="index.php">Ricerca</a></li>
					<li role="presentation"><a href="classifica.php">Classifica</a></li>
					<li role="presentation"><a href="link.php">Link</a></li>
				</ul>
			</nav>
			<h1 class="text-muted">Progetto: Spider</h1>
			<h4 class="text-muted">Ricerca</h4>
		</div>
	
		<div class="jumbotron">

			<div class="header clearfix">
			<h2 class="text-muted text-center">Aggiungi Indirizzi</h2>
				<center>
				<div class="input-group">
					<input type="text" id = "dominio" name = "dominio"	class="form-control text-center" placeholder="inserisca dominio da cercare" style="margin-top: 20px;">
					<input type="text" id = "url" name = "url"	class="form-control text-center" placeholder="inserisca url da cercare" style="margin-top: 10px;">
					<button class="btn btn-info " id ="aggiungi2" type="button">Aggiungi</button>
				</div>
				</center>
			</div>
		
		</div>
		<footer class="footer">		
			<p>Progetto spider di: Armitano Joshua, Ballario Marco, Garro Christian, Gastaldi Paolo, Giraudo Roberto, Mullace Matteo e Olivero Emanuele.</p>
		</footer>
	</div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>