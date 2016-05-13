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
	
		/*istruzioni eseguite al caricamento della pagina*/
		$(document).ready(function(){
			

			/*
			//al click sul bottone del form
			$("#aggiungi2").click(function(){

				//associo variabili
				var dominio = $("#dominio").val();
				var url = $("#url").val();

				//chiamata ajax
				$.ajax({
					//imposto il tipo di invio dati (GET O POST)
					type: "POST",
					//Dove devo inviare i dati recuperati dal form?
					url: "indirizzi.php",
					//Quali dati devo inviare?
					data: "dominio=" + dominio + "&url=" + url,
					dataType: "html",
					//Inizio visualizzazione errori
					success: function(msg) {
						$("#risultato2").html(msg); // messaggio di avvenuta aggiunta valori al db (preso dal file risultato_aggiunta.php) potete impostare anche un alert("Aggiunto, grazie!");
					},
					error: function() {
						alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
					}
				});
			});
			
		*/
		});
		
		deleteProfessor = function(index) {
			$.ajax({
				url:"delete-professor.php",
				type: "POST",
				data: {
					id: index
				},
				success: function(result){
					window.location.reload();
				},
				error: function(richiesta, stato, errori) {}
			});
		}
		
		addProfessor = function(){
			$.ajax({
				url: "add-professor.php",
				type: "POST",
				data: {
					nomProf: $("#professor-name").val()
				},
				success: function(result) {
					window.location.reload();
				},
				error: function(richiesta, stato, errori) {}
			});
		}
	
	</script>
	
  </head>

  <body>
	<div id="ciao"></div>
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
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th style="text-align: center;">Cognome Professore</th>
						<th style="text-align: center;">Conteggio Professore</th>
						<th style="text-align: center;">Aggiungi alla ricerca</th>
						<th style="text-align: center;" colspan=2>Azioni</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						//apertura connessione al database
						$user="root";
						$pwd="";
						try{
							$conn = new PDO("mysql:host=localhost;dbname=dbspider",$user,$pwd);
							$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						}catch(PDOException $ex){
							die("Error: " . $ex -> getMessage());
						}
						
						//selezione dei dati relativi ai professori dal database
						try{
							$stmsql = $conn -> prepare("SELECT cognome, contatore, idProf FROM professori");
							$result = $stmsql -> execute();
						}catch(PDOException $ex){
							die("Error query: " . $ex -> getMessage());
						}
						for($j = 0; $row = $stmsql->fetch(); $j++){
							$nome[$j] = $row[0];
							$contatore[$j] = $row[1];
							$id[$j]=$row[2];
						}
						
						//costruzione della tabella
						echo '<tr>';
						echo '<form action="avviaSpider.php" method="GET" id="avvia-spider">';
						for($i = 0; $i < $j; $i++){
							echo '<tr>';

							//visualizzazione dei professori memorizzati nel database all'interno di tag di inserimento testo
							echo '<td class="active"><input name="professor-name-' . $i . '" class="form-control" value="' . $nome[$i] . '"></input></td>';
							
							echo '<td class="active">' . $contatore[$i] . '</td>';
							echo '<td class="active"><input type="checkbox" name="elencoProfSelezionati[]" value="' . $id[$i] . '"></td>';
							//echo '<td><a href="spider.php"><i class="fa fa-plus-square" style="font-size:24px"></a></i></td>';
							
							echo '<td class="active"><button id="save-'. $id[$i] .'" class="form-control btn-success" type="button">Salva</button></td>';
							echo '<td class="active"><button id="delete-'. $id[$i] .'" class="form-control btn-danger" type="button" onclick="deleteProfessor('. $id[$i] .');">Elimina</button></td>';
							
							echo '</tr>';
						}
						
					?>
					
					<tr>
						<td class="active">
							<input id="professor-name" name="professor-name" class="form-control"></input>
						</td>
						<td class="active"></td>
						<td class="active"></td>
						<td class="active" colspan=2>
							<button id="add-professor" name="add-professor" class="form-control btn-primary" type="button" onclick="addProfessor();">Aggiungi</button>
						</td>
					</tr>
					
				</tbody>	
			</table>
			<p><input class="btn btn-lg btn-success" type="submit" name='avviaRicerca' value="Avvia ricerca" form="avvia-spider"></p>
			</form>
		</div>
		<footer class="footer">		
			<p>Progetto spider di: Armitano Joshua, Ballario Marco, Garro Christian, Gastaldi Paolo, Giraudo Roberto, Mullace Matteo e Olivero Emanuele.</p>
		</footer>
	</div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
