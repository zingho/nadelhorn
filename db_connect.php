<?php
	$servername = "localhost"; // Servername angeben
    $username = "root"; //Username eingeben
    $password = ""; // Passwort eingeben
    $dbname = "nadelhorn"; //Name Datenbank angeben
	 
	$connect = new mysqli($servername, $username, $password, $dbname);
	 
	if($connect->connect_error){
		echo "Could not reach database: $dbname on: $servername. Please check error below: <br>
		Error:" . $connect->connect_error;
		exit(); //Bricht Skript ab
	}
	
	// UTF-8 für Datensätze:
	mysqli_set_charset($connect,"utf8");
?>