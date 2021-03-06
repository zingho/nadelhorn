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

    include('db_connect.php');

    $lid = $_GET['lid'];


  	$sql = "
  	SELECT DISTINCT *
  	FROM news
  	WHERE
  	ID = '$lid'
  	";

    $result = $connect->query($sql);
  	echo '<table id="news_container_detail">';
  	while($zeile = $result->fetch_assoc()){
  	echo "<tr>";
  	echo '<td>'.'<img src="' . $zeile['Bild'] . '" height="350px"> </td>';
  	echo "<td><h2>". $zeile['Titel'] . "</h2><br><p>". $zeile['Beschreibung'] . "</p><br><a href=\"bilderupload.php?lid=" .$zeile['ID']. "\">".'<p style="color:blue;">Change Image</p>' . "</a></td>";
    echo "</tr>";
      }
  	echo "</table>";
    ?>

  <div id="buttons">
  <button onclick="goBack()" class="go_back">Go back</button>
  <button id="contact" style="display:inline;">Share</button>
</div>

<div id="contactForm">

  <h1>Share this link!</h1>

  <form method="post" action="email.php">
    <input placeholder="Name" type="text" required />
    <input placeholder="Email" type="email" name="email" required />
    <?php echo '<textarea name="text">Check out this article: https://www.nadelhorn.ch/detail.php?lid=' .$lid. '</textarea>' ?>
    <input class="formBtn" type="submit" />
    <input class="formBtn" type="reset" />
  </form>
</div>

	</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index1.js"></script>




  <script>
  function goBack() {
    window.history.back();
  }
  </script>

  <Footer>
      <div class="Footer-Left">© 2016-2017
  </Footer>


	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
