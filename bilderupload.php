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
       die('Bitte zuerst<a href="login.php">einloggen</a>');
      }

    include('db_connect.php');

    $lid = $_GET['lid'];



    $query = "
    SELECT DISTINCT *
    FROM news
    WHERE
    ID = '$lid'
    ";

    $result = $connect->query($query);
    echo '<table style="margin-left:auto; margin-right:auto; margin-bottom:80px;">';

    while($zeile = $result->fetch_assoc()){
      echo "<tr>";
      echo '<td>'.'<form action="?action=add_bild&lid='.$lid.'" method="post" enctype="multipart/form-data">' . '</br><input type="file" name="datei"><br>'.'<input type="submit" value="Upload"></form>';

      //Wenn das Formular abgesendet wurder, dann sollen die Daten Variabeln weitergegeben werden
      if(isset($_GET['action'])){
      if($_GET['action'] == "add_bild"){

        $lid=$_GET['lid'];
        if($_FILES['datei']['name'] != ""){
          $bild_link = "images/" . $_FILES['datei']['name'];
         }
         else {
           $bild_link = "";
         }

      //Bilderupload
      $sql = "UPDATE news SET Bild = '$bild_link' WHERE ID = $lid";

        if ($connect->query($sql) === TRUE) {
        echo "</br></br><b>Upload erfolgreich</b>";
        } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
         }


        if($_FILES['datei']['name'] != ""){
           $upload_folder = 'images/'; //Das Upload-Verzeichnis
           $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
           $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


           //Überprüfung der Dateiendung
           $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
           if(!in_array($extension, $allowed_extensions)) {
           die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
           }

           //Überprüfung der Dateigröße
           $max_size = 500*1024; //500 KB
           if($_FILES['datei']['size'] > $max_size) {
           die("Bitte keine Dateien größer 500kb hochladen");
           }

           //Überprüfung dass das Bild keine Fehler enthält
           if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
           $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
           $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
           if(!in_array($detected_type, $allowed_types)) {
           die("Nur der Upload von Bilddateien ist gestattet");
           }
           }

           //Pfad zum Upload
           $new_path = $upload_folder.$filename.'.'.$extension;

           //Neuer Dateiname falls die Datei bereits existiert
           if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
           $id = 1;
           do {
           $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
           $id++;
           } while(file_exists($new_path));
           }

           //Alles okay, verschiebe Datei an neuen Pfad
           move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
          }

        }
      }

        echo "</td>";
        }
        echo "</table>";



        ?>

        <button onclick="goBack()" class="knopf">Zurück</button>

        <script>
        function goBack() {
          window.history.back();
        }
        </script>

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
