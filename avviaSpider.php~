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
			$stmt = $dbh->prepare('UPDATE professori SET selezionato=FALSE'); /*stmt = statement*/	
			$stmt->execute();
			
			/*seleziono solo i prof che sono stati selezionati dell'utente*/
			foreach($_GET['elencoProfSelezionati'] as $professore){ //elencoProfSelezionati è un array contenente le checkbox selezionate
				$stmt = $dbh->prepare('UPDATE professori SET selezionato=TRUE WHERE idProf=:idProf'); //stmt = statement	
				$stmt->bindParam(':idProf', $professore, PDO::PARAM_INT);
				$stmt->execute();
			}
			
			$stmt = $dbh->prepare('SELECT dominio, urlPartenza FROM indirizzi');
			$stmt->execute();
			$risultati = $stmt->fetchAll();
			
			echo '<h3>Sto avviando gli spider...</h3>';
			
			$stmt = $dbh->prepare('SELECT * FROM indirizzi'); /*stmt = statement*/	
			$stmt->execute();
			$risultati = $stmt->fetchAll();
			
			/*avvio degli spider*/
			foreach($risultati as $sitoWeb){
				
				$programma = escapeshellcmd('scrapy crawl spiderRicerca -a allowed_domain=' .$sitoWeb['dominio']  .' -a start_url=' .$sitoWeb['urlPartenza']);
				
				echo 'Avviato spider su ' .$sitoWeb['dominio'] .'<br>';
				
				echo shell_exec($programma);
			}
			
			//shell_exec('scrapy crawl spiderRicerca -a allowed_domain=itiscuneo.gov.it -a start_url=http://www.itiscuneo.gov.it/');
			
			/*disconnessione*/
			$dbh = null;
			
			/*redirecting alla pagina dei risultati*/
			//header("Location: classifica.php");
			//die();
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
