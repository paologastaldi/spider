<?php
	$user="root";
	$pwd="";
	$nomProf = $_POST['nomProf'];
	try{
		$conn = new PDO("mysql:host=localhost;dbname=dbspider",$user,$pwd);
		$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
		die("Error: " . $ex -> getMessage());
	}
	
	try{
		$stmSql=$conn->prepare("INSERT INTO professori(cognome) VALUES(?)");
		$stmSql->bindParam(1, $nomProf);
		$result=$stmSql->execute();
	}catch(PDOException $ex){
			echo("Query errata".$ex->getMessage());
	}

	$conn=null;
	echo "ok";
?>