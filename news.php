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
	<div id="fixed">
		<div id="header">
			<a href="index.php"><img src="images/logo.png" class="logo"></a>
			<ul id="nav">
			<li class="toggle">
			  <div class="bar1"></div><div class="bar2"></div><div class="bar3"></div>
			</li>
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

	<div id="bild1">
	<div class="inhalt">
            <div class="title">
                <h1>News</h1>
            </div>

		<form action="suche.php" method="post" id="search">
		<table align="center" width="100%">
			<tr>
				<td width="60%"><input name="name" type="text" maxlength="255" size="20" /></td>
			</tr>
		</table>
		</form>
    </div>
	</div>
		</div>

	<div class="text">

    <?php

    include('db_connect.php');

    $sql = "
          SELECT  *
          FROM news
          ";

          echo '<div id="Break">';
          // Ausgabe
          $result = $connect->query($sql);
          if($result->num_rows>0){
              while($zeile = $result->fetch_assoc()){
              echo '<div id="news_container">';
              echo '<img src="' . $zeile['Bild'] . '" height="150px" class="news_bild">';
              echo "<h2><a href=\"bilderupload.php?lid=" .$zeile['ID']. "\">". $zeile['Titel'] . "</a></h2></br>";
              echo '<p class="clear"></p>';
              echo "</div>";
              }
          }
        echo "</div>";
    ?>

	</div>

  <div id="Footer_Index">
      <div class="Footer-Left">© 2016-2017</div>
  </div>


	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="js/index.js"></script>

  </body>
</html>
