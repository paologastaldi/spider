<?php

	$id_professor = $_POST['id'];

	$user="root";
	$pwd="";
	try{
		$conn = new PDO("mysql:host=localhost;dbname=dbspider",$user,$pwd);
		$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
		die("Error: " . $ex -> getMessage());
	}
	
	try{
		$stmsql = $conn -> prepare("DELETE FROM professori WHERE idProf=$id_professor");
		$result = $stmsql -> execute();
	}catch(PDOException $ex){
		die("Error query: " . $ex -> getMessage());
	}
	
	$conn = null;
	echo $id_professor;

?>