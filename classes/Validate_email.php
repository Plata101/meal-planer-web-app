<?php
// The class "DatabaseConnection" inherits from the superclass PDO
class Validate_email {
  function Validate($email) {
    $comment = 1;
  if (empty($email)) {
  			$errorMsg_required = "all fields are required";
  		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$errorMsg_required = "please enter valid e-mail";
  		} else {
  				// Connect to database
  				$con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
  				// Error message if connection fails
  				if (mysqli_connect_errno()) {
  						echo "Couldnt connect to DB: ".mysqli_connect_error();
  						}
  				$check=mysqli_query($con,"SELECT * FROM `user_data` WHERE e_mail='$email'");
  				$checkrows=mysqli_num_rows($check);
  				if($checkrows>0) {
  				echo "blabla";
  			} else {
  		// Prepared Statement erstellen - mit Platzhalter für User-Eingabe:
  		$insertQuery = "INSERT INTO `user_data` (e_mail, comment) VALUES ((?), (?))";

  		// Befehl wird ausgeführt ohne Daten absenden
  		$statement = mysqli_prepare($db, $insertQuery);

  		// Daten mit Datentypen absenden (hier 's' für string):
  		mysqli_stmt_bind_param($statement, 'ss', $email, $comment);

  		// Befehl wird mit den geschickten Daten ausgeführt:
  		$result = mysqli_stmt_execute($statement);

  		// Daten werden mit der Datenbank verglichen
  				if($result == true) {
  						// Bei Erfolg Erstellung der Sessions und Weiterleitung aufs Dashboard
  						echo "blabla";
  				} else {
  						// Wenn beim Check kein User mit diesem Usernamen gefunden wurde
  						echo "Die Registrierung konnte nicht abgeschlossen werden";
  				}
        }
      }
    }
  }
?>
