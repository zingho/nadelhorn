<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=nadelhorn', 'root', 'my123');
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

          <div id="fixed"> <!-- Macht, dass die Navigation + das Logo immer mitscrollt -->
        		  <div id="header">
        			     <a href="index.php"><img src="images/logo.png" class="logo"></a> <!-- Logo -->
        			      <ul id="nav">
        			           <li class="toggle"> <!-- Navigation / responsive / funktioniert noch nicht ganz -->
        			                <div class="bar1"></div><div class="bar2"></div><div class="bar3"></div>
        			           </li>

                          <!-- Navigation Listenelemente -->
                    			<li><a href="index.php">Home</a></li>
                    			<li><a href="news.php">News</a></li>
                    			<li><a href="">VIP Tours</a></li>
                    			<li><a href="contact.php">Contact </a></li>
                    			<li><a href="guest.php">Guestbook </a></li>
                    			<li><a href="login.php">Login </a></li>
                    			<li><a href="registrieren.php" class="active">Registration </a></li>
        		     </ul>
        		  </div>
        	</div>

          <div id="bild1"> <!-- Kleinerer Header für die Unterseiten -->
            	<div class="inhalt">
                        <div class="title">
                <h1>Registration</h1>
            </div>

    </div>
	</div>

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
	 echo 'Please enter a valid E-Mail<br>';
	 $error = true;
	 }
	 if(strlen($passwort) == 0) {
	 echo 'Password<br>';
	 $error = true;
	 }
	 if($passwort != $passwort2) {
	 echo 'The passwords need to match<br>';
	 $error = true;
	 }

	 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	 if(!$error) {
	 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	 $result = $statement->execute(array('email' => $email));
	 $user = $statement->fetch();

	 if($user !== false) {
	 echo 'This E-Mail adress already has an account<br>';
	 $error = true;
	 }
	 }

	 //Keine Fehler, wir können den Nutzer registrieren
	 if(!$error) {
	 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

	 $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
	 $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

	 if($result) {
	 echo 'Thank you for your registration . <a href="login.php">-> Login</a>';
	 $showFormular = false;
	 } else {
	 echo 'Error<br>';
	 }
	 }
	}

	if($showFormular) {
	?>

	<form action="?register=1" method="post">
	E-Mail:<br>
	<input class="input" type="email" size="40" maxlength="250" name="email"><br><br>

	Your passwort:<br>
	<input class="input" type="password" size="40"  maxlength="250" name="passwort"><br><br>

	Repeat password:<br>
	<input class="input" type="password" size="40" maxlength="250" name="passwort2"><br><br>

	First Name:<br>
	<input class="input" type="text" size="40" maxlength="250" name="vorname"><br><br>

	Second Name<br>
	<input class="input" type="text" size="40" maxlength="250" name="nachname"><br><br>

	<input type="submit" value="Send" class="knopf">
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
