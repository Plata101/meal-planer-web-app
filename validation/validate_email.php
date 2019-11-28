<?php
// sets comment to one for future review opportunities
$comment = 1;
// putting all value sanitized from form into variables
$email = filter_var($_POST['e-mail'], FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($email)) {
    $errorMsg_required = "THIS FIELD MUST BE FILLED IN";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMsg_required = "PLEASE ENTER A VALID E-MAIL";
  } else {
      // Connect to database
      $con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
      // Error message if connection fails
      if (mysqli_connect_errno()) {
        $_SESSION['message'] = "COULDNT CONNECT TO DB: ".mysqli_connect_error();
        header ('Location: 404.php');
          }
      // To avoid double email entries, check in DB wheter Email exists, if yes, go to send mail.
      $check=mysqli_query($con,"SELECT * FROM `user_data` WHERE e_mail='$email'");
      $checkrows=mysqli_num_rows($check);
      if($checkrows>0) {
      include ('libraries/send_mail.php');
    } else {
  // Create prepared statement - with placeholder for user input:
  $insertQuery = "INSERT INTO `user_data` (e_mail, comment) VALUES ((?), (?))";

  // Command is executed without sending data
  $statement = mysqli_prepare($db, $insertQuery);

  // Send data with data types (here 's' for string):
  mysqli_stmt_bind_param($statement, 'ss', $email, $comment);

  // Command is executed with the sent data:
  $result = mysqli_stmt_execute($statement);

  //
  include ('libraries/send_mail.php');
}
}
?>
