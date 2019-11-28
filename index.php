<?php
session_start();
// check wheter girl or guy button has been clicked and saving
// the according variable into session (guy: 5, girl: -161)
if (isset($_POST['guy'] )) {
    $gender = 5;
    $_SESSION['gender'] = $gender;
    header("Location: physical-activity.php");
    }
    if (isset($_POST['girl'])) {
    $gender = -161;
    $_SESSION['gender'] = $gender;
    header("Location: physical-activity.php");
    }
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon May 27 2019 16:37:33 GMT+0000 (UTC)  -->
<html data-wf-page="5cebfef55abdf604f155820d" data-wf-site="5cb33acc4e458427ca06e14c">
<head>
  <meta charset="utf-8">
  <title>Luca_Fithealth_App</title>
  <meta content="" name="description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/luca-fithealth-app.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
  <meta name="theme-color" content="#000000">
</head>
<body class="body">
  <div class="lu_main_container">
    <div class="w-layout-grid grid"><img src="images/lucalogo.png" width="10" id="w-node-b16707ae61d7-f155820d" alt="" class="lu_logo">
      <h1 id="w-node-42268d288934-f155820d" class="lu_get_your">GET YOUR VEGAN MEALPLAN NOW!</h1>
      <p id="w-node-d85df221a146-f155820d" class="lu_review">991 Customer Reviews</p><img src="images/stars.png" srcset="images/stars-p-500.png 500w, images/stars-p-800.png 800w, images/stars.png 1000w" sizes="(max-width: 479px) 90px, (max-width: 767px) 61px, (max-width: 991px) 75px, 100px" id="w-node-0eeababa9498-f155820d" alt="" class="lu_review_stars">
      <div id="w-node-90292d09de6d-f155820d" class="lu_progressbar_wrapper">
        <div class="lu_perc_progbar">
          <p class="paragraph pos1">16.5%</p>
        </div>
        <div class="lu_progress_line">
          <div class="lu_progress_1"></div>
        </div>
        <div class="lu_progress_bar">
          <div class="lu_gender"><img src="images/guygirl.png" srcset="images/guygirl-p-500.png 500w, images/guygirl-p-800.png 800w, images/guygirl.png 905w" sizes="(max-width: 767px) 52.765625px, (max-width: 991px) 64.640625px, 85.75px" alt="" class="lu_gender_pic"></div>
          <div class="lu_weight"><img src="images/weight-silhouette-for-medical-sport-practice.png" alt="" class="weight"></div>
          <div class="lu_desk"><img src="images/man-in-office-desk-with-computer.png" alt="" class="lu_desk_pic"></div>
          <div class="lu_weight lu_scale"><img src="images/icon.png" alt="" class="scale"></div>
          <div class="lu_meal"><img src="images/diet.png" alt="" class="lu_meal_pic"></div>
          <div class="lu_pdf"><img src="images/pdf.png" alt="" class="lu_pdf_pic"></div>
        </div>
      </div><img src="images/luca.png" srcset="images/luca-p-500.png 500w, images/luca.png 669w" sizes="(max-width: 479px) 262.125px, (max-width: 767px) 180.21875px, (max-width: 991px) 207.515625px, 229.359375px" id="w-node-74d9b17b1742-f155820d" alt="" class="lu_luca">
      <div id="w-node-f0214f1938df-f155820d" class="lu_gender_form w-form">
        <form method="post" action="index.php" class="lu_gender_form_form">
          <input type="submit" name="guy" value=" " class="lu_guy_button w-button">
          <input type="submit" name="girl" value=" " class="lu_girll_button w-button">
        </form>
        <!-- <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div> -->
      </div>
      <h2 id="w-node-4428b72019c0-f155820d" class="lu_start_selecting">START BY SELECTING YOUR GENDER</h2>
      <div id="w-node-79c4d4b52fbe-f155820d" class="lu_question">
        <p class="paragraph-2">?</p>
      </div>
      <p id="w-node-466cb841c177-f155820d" class="lu_contact_faq">CONTACT<br>FAQ<br>COOKIE POLICY</p><img src="images/lucalogo.png" width="96" height="96" id="w-node-abb5a0981aa6-f155820d" alt="" class="lu_logo_small"></div>
  </div>
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
