<?php
	$idBtnAvvioRicerca = 'avviaRicerca';
	$nomeCheckList = 'elencoProfSelezionati';

	if(isset($_GET[$idBtnAvvioRicerca])){
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database_name = 'dbspider';
		
		try {
			/*connessione*/
			$dbh = new PDO("mysql:host=$hostname;dbname=$database_name", $username, $password);
			
			/*deselezione di tutti i campi*/
			$stmt = $dbh->prepare('UPDATE professori SET selezionato=FALSE, contatore=0'); /*stmt = statement*/	
			$stmt->execute();
			
			/*seleziono solo i prof che sono stati selezionati dell'utente*/
			foreach($_GET['elencoProfSelezionati'] as $professore){ //elencoProfSelezionati è un array contenente le checkbox selezionate
				$stmt->closeCursor();
				$stmt = $dbh->prepare('UPDATE professori SET selezionato=TRUE WHERE idProf=:idProf'); //stmt = statement	
				$stmt->bindParam(':idProf', $professore, PDO::PARAM_INT);
				$stmt->execute();
			}
			
			$stmt->closeCursor();
			$stmt = $dbh->prepare('SELECT dominio, urlPartenza FROM indirizzi');
			$stmt->execute();
			$risultati = $stmt->fetchAll();
			
			echo '<h3>Sto avviando gli spider...</h3>';
			
			$stmt->closeCursor();
			$stmt = $dbh->prepare('SELECT * FROM indirizzi'); /*stmt = statement*/	
			$stmt->execute();
			$risultati = $stmt->fetchAll();
			
			/*avvio degli spider*/
			/*$cmd = 'scrapy crawl spiderRicerca -a allowed_domain=[';
			foreach($risultati as $sitoWeb){
				$cmd = $cmd .'"' .$sitoWeb['dominio'] .'"' .',';
			}
			$cmd = $cmd .'] -a start_url=[';
			foreach($risultati as $sitoWeb){
				$cmd = $cmd .'"' .$sitoWeb['urlPartenza'] .'"' .',';
			}
			$cmd = $cmd .']';
			
			$programma = escapeshellcmd($cmd);
			echo 'Avviato spider: ' .$cmd .'<br>';
			
			echo shell_exec($programma);*/
			
			$cmd = "";
			
			foreach($risultati as $sitoWeb){
				$programma = escapeshellcmd('python ./test.py "scrapy crawl spiderRicerca -a allowed_domain=' .$sitoWeb['dominio']  .' -a start_url=' .$sitoWeb['urlPartenza'] .'"');
				
			
				echo 'Avviato spider: ' .$programma .'<br>';
				echo shell_exec($programma) .'<br>';
				
				//$cmd = $cmd ." && " .$programma;			
			}
				
			//echo (exec($programma) != NULL ? "OK" : "Error") .'<br>';	
			
			//shell_exec('scrapy crawl spiderRicerca -a allowed_domain=itiscuneo.gov.it -a start_url=http://www.itiscuneo.gov.it/');
			
			$stmt->closeCursor();
			/*disconnessione*/
			$dbh = null;
			
			/*redirecting alla pagina dei risultati*/
			/*header("Location: classifica.php");
			die();*/
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	else{
		echo 'Tu non puoi accedere direttamente a questa pagina';
	}
?>
