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
  <div class="containercontact">
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
			<li><a href="contact.php" class="active">Contact </a></li>
			<li><a href="guest.php">Guestbook </a></li> 			
			<li><a href="login.php">Login </a></li>    
			<li><a href="registrieren.php">Registrieren </a></li>    
		</ul>
	</div>
	
	<header>
	<div class="inhalt">
            <div class="title">
                <h1>Contact </h1>

            </div>
    </div>
	</header>
		</div>
	
	<div class="text">
		
	</div>

<form method="post" action="email.php">
<label for="Name">Name:</label><br>
<input type="text" id="Name" name="Name"><br><br>
 
<label for="Email">E-Mail:</label><br>
<input type="text" id="Email" name="Email"><br><br>
 
<label for="Betreff">Betreff:</label><br>
<input type="text" id="Betreff" name="Betreff"><br><br>
 
<label for="Nachricht">Nachricht:</label><br>
<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br>
 
<input type="submit" name="submit">
</form>


	
	




	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>