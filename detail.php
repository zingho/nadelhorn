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
  	echo "<td><h2>". $zeile['Titel'] . "</h2><br><p>". $zeile['Beschreibung'] . "</p></td>";
  	echo "</tr>";
      }
  	echo "</table>";
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
