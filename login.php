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
                    			<li><a href="login.php" class="active">Login </a></li>
                    			<li><a href="registrieren.php">Registration </a></li>
        		     </ul>
        		  </div>
        	</div>

          <div id="bild1"> <!-- Kleinerer Header für die Unterseiten -->
            	<div class="inhalt">
                        <div class="title">
                <h1>Login</h1>
            </div>

    </div>
	</div>

  </div>

	<!-- Textbereich -->
	<div class="text" align="center">

	<?php
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=nadelhorn', 'root', '');

	if(isset($_GET['login'])) {
	 $email = $_POST['email'];
	 $passwort = $_POST['passwort'];

	 $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	 $result = $statement->execute(array('email' => $email));
	 $user = $statement->fetch();

	 //Überprüfung des Passworts
	 if ($user !== false && password_verify($passwort, $user['passwort'])) {
	 $_SESSION['userid'] = $user['id'];
	 die('Login erfolgreich.');
	 } else {
	 $errorMessage = "E-Mail oder Passwort war ungültig<br><br>";
	 }

	}
	?>
	<?php
	if(isset($errorMessage)) {
	 echo $errorMessage;
	}
	?>

	<form action="?login=1" method="post">
	E-Mail:<br>
	<input class="input" type="email" size="40" maxlength="250" name="email"><br><br><br>

	Dein Passwort:<br>
	<input class="input" type="password" size="40"  maxlength="250" name="passwort"><br><br>

	<input type="submit" value="Abschicken" class="knopf">
	</form>
	</br>
	</div>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>


  </body>
</html>
