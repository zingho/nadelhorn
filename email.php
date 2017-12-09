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
                <h1>Thank you for your request</h1>
            </div>
    </div>
	</header>
		</div>
  		</div>

	<div class="text">

    Your Mail will be sent.

    <?php
    $empfaenger = $_POST['email'];
    $betreff = "Nadelhorn.ch";
    $from = "From: Admin Nadelhorn <admin@nadelhorn.ch>";
    $text = $_POST['text'];

    mail($empfaenger, $betreff, $text, $from);
    ?>
	</div>

  <Footer>
      <div class="Footer-Left">© 2016-2017
  </Footer>




	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
