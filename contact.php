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
                			<li><a href="contact.php" class="active">Contact </a></li>
                			<li><a href="guest.php">Guestbook </a></li>
                			<li><a href="login.php">Login </a></li>
                			<li><a href="registrieren.php">Registration </a></li>
    		     </ul>
    		  </div>
    	</div>

      <div id="bild1"> <!-- Kleinerer Header für die Unterseiten -->
        	<div class="inhalt">
                    <div class="title">
                        <h1>Contact </h1>
                    </div>
          </div>
    	</div>
	</div>

	<div class="text">

	</div>

<form method="post" action="send_email.php">
<label for="Name">Name:</label><br>
<input type="text" id="Name" name="Name"><br><br>

<label for="Email">E-Mail:</label><br>
<input type="text" id="Email" name="Email"><br><br>

<label for="Betreff">Subject:</label><br>
<input type="text" id="Betreff" name="Betreff"><br><br>

<label for="Nachricht">Message:</label><br>
<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br>

<input type="submit" name="submit">
</form>









	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
