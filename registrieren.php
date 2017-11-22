<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=nadelhorn', 'root', '');
?>

<!DOCTYPE html>
<html lang="de">
  <head>
	<link rel="stylesheet" href="css/main.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switzerland - beyond your imagination</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
  </head>
  <body>
  <div class="container">
	<div id="header">
		<img src="images/logo.png" class="logo">
		<ul id="nav">
			<li class="toggle">
			  <div class="bar1"></div><div class="bar2"></div><div class="bar3"></div>
			</li>
			<li><a href="index.php">Home</a></li>
			<li><a href="">News</a></li>
			<li><a href="">VIP Tours</a></li>
			<li><a href="">Impressions</a></li>    
			<li><a href="">About us</a></li>    
			<li><a href="contact.php">Contact </a></li>    
			<li><a href="guest.php">Guestbook </a></li>
			<li><a href="login.php">Login </a></li>    
			<li><a href="registrieren.php" class="active">Registrieren </a></li>    
		</ul>
		
	</div>
	  
	 	<header>
	<div class="inhalt">
            <div class="title">
                <h1>Registration</h1>
            </div>

    </div>
	</header> 
	  
  </div>
	
	<!-- Textbereich -->  
	<div class="text">
 
	<?php
	$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
	 
	if(isset($_GET['register'])) {
	 $error = false;
	 $email = $_POST['email'];
	 $passwort = $_POST['passwort'];
	 $passwort2 = $_POST['passwort2']; 
	 $vorname = $_POST['vorname'];
	 $nachname = $_POST['nachname'];
	  
	 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
	 $error = true;
	 } 
	 if(strlen($passwort) == 0) {
	 echo 'Bitte ein Passwort angeben<br>';
	 $error = true;
	 }
	 if($passwort != $passwort2) {
	 echo 'Die Passwörter müssen übereinstimmen<br>';
	 $error = true;
	 }
	 
	 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	 if(!$error) { 
	 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	 $result = $statement->execute(array('email' => $email));
	 $user = $statement->fetch();
	 
	 if($user !== false) {
	 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
	 $error = true;
	 } 
	 }
	 
	 //Keine Fehler, wir können den Nutzer registrieren
	 if(!$error) { 
	 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
	 
	 $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
	 $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));
	 
	 if($result) { 
	 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
	 $showFormular = false;
	 } else {
	 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
	 }
	 } 
	}
	 
	if($showFormular) {
	?>
	 
	<form action="?register=1" method="post">
	E-Mail:<br>
	<input class="input" type="email" size="40" maxlength="250" name="email"><br><br>
	 
	Dein Passwort:<br>
	<input class="input" type="password" size="40"  maxlength="250" name="passwort"><br><br>
	 
	Passwort wiederholen:<br>
	<input class="input" type="password" size="40" maxlength="250" name="passwort2"><br><br>

	Vorname:<br>
	<input class="input" type="text" size="40" maxlength="250" name="vorname"><br><br>

	Nachname<br>
	<input class="input" type="text" size="40" maxlength="250" name="nachname"><br><br>
	 
	<input type="submit" value="Abschicken" class="knopf">
	</form>
	 
	<?php
	} //Ende von if($showFormular)
	?>
		</br>
	</div>
	
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

	
  </body>
</html>
