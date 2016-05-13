<?php

	$user="root";
	$pwd="";
	$dominio = $_POST['dominio'];
	$url = $_POST['url'];
	try{
		$conn = new PDO("mysql:host=localhost;dbname=dbspider",$user,$pwd);
		$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
		die("Error: " . $ex -> getMessage());
	}
	
	try{
		
		$stmSql=$conn->prepare("INSERT INTO indirizzi(dominio,urlPartenza) VALUES(?,?)");
		$stmSql->bindParam(1,$dominio);
		$stmSql->bindParam(2,$url);
		$result=$stmSql->execute();
	}catch(PDOException $ex){
			echo("Query errata".$ex->getMessage());
	}

	try{
		$stmsql = $conn -> prepare("SELECT dominio, urlPartenza, idUrl FROM indirizzi");
		$result = $stmsql -> execute();
	}catch(PDOException $ex){
		die("Error query: " . $ex -> getMessage());
	}
	
	for($j=0; $row=$stmsql->fetch(); $j++){
		$dominio[$j] = $row[0];
		$urlPartenza[$j] = $row[1];
		$id[$j]=$row[2];
	}
	
	for($i=0; $i<$j; $i++){
		if($i == 0){
			echo '<tr class="warning">';
			echo '<form action="avviaSpider.php" method="GET">';
		}else{
			echo '<tr>';
		}
		echo '<td>' . $dominio[$i] . '</td>';
		echo '<td>' . $urlPartenza[$i] . '</td>';
		echo '<name = "id" id = "id" value="' . $id[$i] . '"></td>';
		echo '<td><button class="btn btn-default" id ="elimina" type="button">Elimina</button> </td>';
		echo '<td><name="elencoUrlSelezionati[]" value="' . $id[$i] . '"></td>';
	
		//echo '<td><a href="spider.php"><i class="fa fa-plus-square" style="font-size:24px"></a></i></td>';  
		echo '</tr>';
	}	

	$conn=null;
	
?>