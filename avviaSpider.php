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
			
			$cmd = escapeshellcmd('python ' .__DIR__ .'/test.py');
			echo "cmd: $cmd <br>";
			echo shell_exec($cmd);
			
			/*disconnessione*/
			$dbh = null;
			
			/*redirecting alla pagina dei risultati*/
			header("Location: classifica.php");
			die();
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
