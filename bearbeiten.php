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
                			<li><a href="news.php" class="active">News</a></li>
                			<li><a href="">VIP Tours</a></li>
                			<li><a href="contact.php">Contact </a></li>
                			<li><a href="guest.php">Guestbook </a></li>
                			<li><a href="login.php">Login </a></li>
                			<li><a href="registrieren.php">Registration </a></li>
    		     </ul>
    		  </div>
    	</div>

      <div id="bild1"> <!-- Kleinerer Header für die Unterseiten -->
            	<div class="inhalt">
                        <div class="title">
                <h1>News</h1>
            </div>
    </div>
	</div>
		</div>

	<div class="text">

    <?php

    //Schauen ob der User eingeloggt ist
    session_start();
    if(!isset($_SESSION['userid'])) {
     die('Please log in first');
    }

    $lid = $_GET['lid'];

    include('db_connect.php');

    $sql = "
    SELECT DISTINCT *
    FROM news
    WHERE
    ID = '$lid'
    ";

    //Ausgabe Resultat
    $result = $connect->query($sql);
    while($zeile = $result->fetch_assoc()){
      echo $zeile['ID'];
    }

    ?>

	</div>

  <button onclick="goBack()" class="go_back">Go back</button>

  <script>
  function goBack() {
    window.history.back();
  }
  </script>

  <Footer>
      <div class="Footer-Left">© 2016-2017</div>
  </Footer>


	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
