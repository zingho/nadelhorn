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
                <h1>Search</h1>
            </div>

            <form action="suche.php" method="post" class="form-wrapper cf">
          	<input type="text" placeholder="Search here..." required name="name">
        	  <button type="submit">Search</button>
            </form>

  </div>
	</div>
		</div>

	<div class="text">

 <?php
			include('db_connect.php');

			$suche = $_POST['name'];

			// Bestimmen, nach was gesucht wird
			$sql = "
			SELECT DISTINCT *
			FROM news
			WHERE
			Titel LIKE '%$suche%'
			OR
			Beschreibung LIKE '%$suche%';
			";

			// Ausgabe der Suche

      echo '<div id="Break">';

			$result = $connect->query($sql);
			if($result->num_rows>0){
        echo "<p>Search results for"." ".$suche . "</p></br>";
      	while($zeile = $result->fetch_assoc()){
          echo '<div id="news_container">';
          echo '<img src="' . $zeile['Bild'] . '" height="150px" class="news_bild">';
          echo "<h2><a href=\"detail.php?lid=" .$zeile['ID']. "\">". $zeile['Titel'] . "</a></h2></br>";
          echo '<p class="clear"></p>';
          echo "</div>";
          }
			}


			// Falls keine Einträge gefunden werden
			else{
				echo "<h3>Keine Ergebnisse für $suche gefunden</h3>";
			}

    echo "</div>";
		?>

	</div>
	</br></br>


	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
