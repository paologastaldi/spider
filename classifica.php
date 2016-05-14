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

    <title>Narrow Jumbotron Template for Bootstrap</title>

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
        <h4 class="text-muted">Link</h4>
      </div>
	  
	
      <div class="jumbotron">
		<div class="row" style="padding-left: 20%; padding-right: 20%" >
			<div class="pull-left">
				<label>Cognome professore</label>
			</div>
			<div class="pull-right">
				<label>Conteggio</label>
			</div>
		</div>
		<div class="list-group">
			<?php
				$hostname = 'localhost';
				$username = 'root';
				$password = '';
				$database_name = 'dbspider';
				try {
					$dbh = new PDO("mysql:host=$hostname;dbname=$database_name", $username, $password);

					$stmt = $dbh->prepare('SELECT cognome, contatore FROM professori WHERE selezionato ORDER BY contatore DESC'); /*stmt --> statement*/	
					$stmt->execute();	
					$risultati = $stmt->fetchAll();

					foreach($risultati as $professore){
						//echo '<tr><td>' . $professore['cognome'] .'</td><td>' . $professore['contatore'] .'</td></tr>';
						
						echo '<li class="list-group-item">
								<div class="row" style="padding-left: 20%; padding-right: 20%" >
									<div class="pull-left">
										<label>' . $professore['cognome'] .'</label>
									</div>
									<div class="pull-right">
										<label>' . $professore['contatore'] .'</label>
									</div>
								</div>
							</li>';
					}
					$dbh=null;
				}
				catch(PDOException $e)
				{
				echo $e->getMessage();
				}
			?>
		</div>
      </div>

      <footer class="footer">
		
        <p>Progetto spider di: Armitano Joshua, Ballario Marco, Garro Christian, Gastaldi Paolo, Giraudo Roberto, Mullace Matteo e Olivero Emanuele.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
