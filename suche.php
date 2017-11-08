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
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="">News</a></li>
			<li><a href="">VIP Tours</a></li>
			<li><a href="">Impressions</a></li>    
			<li><a href="">About us</a></li>    
			<li><a href="contact.php">Contact </a></li>    
			<li><a href="guest.php">Guestbook </a></li>
			<li><a href="login.php">Login </a></li>    
			<li><a href="registrieren.php">Registrieren </a></li>    
		</ul>
		
	</div>
	
	<header>
	<div class="inhalt">
            <div class="title">
                <h1>Switzerland beyond your imagination</h1>
                <p>there is a lot to see in this wonderful country. We organize tours to the Region of Lucerne including it's fantastic lake, the center of Switzerland, the Bernese Oberland, Grimsel Pass, the gorgeous beauty of Valais and Graubünden to mention a few highlights.</p>
            </div>
			
		<form action="suche.php" method="post" id="search">
		<table align="center" width="100%">
			<tr>
				<td width="60%"><input name="name" type="text" maxlength="255" size="20" /></td>
			</tr>
		</table>
		</form>
    </div>
	</header>
		</div>
	
	<div class="text">
					<?php
			include('db_connect.php');

			$suche = $_POST['name'];

			// Bestimmen, nach was gesucht wird
			$sql = "
			SELECT DISTINCT * 
			FROM 
			WHERE
			Land LIKE '%$suche%'
			OR
			Name LIKE '%$suche%';
			";

			// Ausgabe der Suche
			$result = $connect->query($sql);
			if($result->num_rows>0){
					
			}
			
			// Falls keine Einträge gefunden werden
			else{
				echo "<h3>Keine Ergebnisse für $suche gefunden</h3>";
			}		
		?>
	
	</div>
	</br></br>
	
	<div id="artikel">
	<h3>Our Portfolio</h3></br>
	
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
