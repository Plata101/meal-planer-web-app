<?php
// checks wheter user is logged in and is admin
if (!$_SESSION['user'] || $_SESSION['user'] != "admin") {
  $_SESSION['errormessage'] = "You must be logged in to access this page";
  header('Location: 404.php');
}
?>
