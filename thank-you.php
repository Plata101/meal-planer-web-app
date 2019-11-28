<?php
session_start();
$filename = $_SESSION['filename'];
unlink("/Applications/MAMP/htdocs/luca-fithealth-app/html_to_pdf2/mealplans/$filename");
session_unset();
 ?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jun 01 2019 21:57:12 GMT+0000 (UTC)  -->
<html data-wf-page="5cebfef55abdf69788558217" data-wf-site="5cb33acc4e458427ca06e14c">
<head>
  <meta charset="utf-8">
  <title>Thank_You</title>
  <meta content="Thank_You" property="og:title">
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
</head>
<body class="body">
  <div class="lu_main_container">
    <div class="w-layout-grid grid">
      <div id="w-node-90292d09de6d-88558217" class="lu_progressbar_wrapper">
        <div class="lu_perc_progbar">
          <p class="paragraph pos6">100%</p>
        </div>
        <div class="lu_progress_line">
          <div class="lu_progress_1 wa_line6"></div>
        </div>
        <div class="lu_progress_bar">
          <div class="lu_gender lu_gender_no"><img src="images/guygirl.png" srcset="images/guygirl-p-500.png 500w, images/guygirl-p-800.png 800w, images/guygirl.png 905w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 52.765625px, (max-width: 991px) 64.640625px, 85.75px" alt="" class="lu_gender_pic"></div>
          <div class="lu_weight pa lu_weight_no2"><img src="images/weight-silhouette-for-medical-sport-practice.png" alt="" class="weight"></div>
          <div class="lu_desk wa"><img src="images/man-in-office-desk-with-computer.png" alt="" class="lu_desk_pic"></div>
          <div class="lu_weight lu_scale measurement_scale"><img src="images/icon.png" alt="" class="scale"></div>
          <div class="lu_meal mealplan_ready lu_meal_yes lu_meal_none"><img src="images/diet.png" alt="" class="lu_meal_pic"></div>
          <div class="lu_pdf lu_pdf_ready"><img src="images/pdf.png" alt="" class="lu_pdf_pic"></div>
        </div>
      </div>
      <h2 id="w-node-9a872a11bd4a-88558217" class="pa_free_time thank_you">THANK YOU</h2><img src="images/luca_backside.jpg" srcset="images/luca_backside-p-500.jpeg 500w, images/luca_backside-p-800.jpeg 800w, images/luca_backside.jpg 1080w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 110px, (max-width: 991px) 170px, 180px" id="w-node-29be87591356-88558217" alt="" class="lu_luca_back">
      <div id="w-node-79c4d4b52fbe-88558217" class="lu_question">
        <p class="paragraph-2">?</p>
      </div>
      <p id="w-node-466cb841c177-88558217" class="lu_contact_faq">CONTACT<br>FAQ<br>COOKIE POLICY</p>
      <p id="w-node-7523b7ba94ef-88558217" class="lu_thank_you_text">E-MAIL HAS BEEN SENT. THANKS A LOT FOR PURCHASING THIS MEAL PLAN.</p>
      <div id="w-node-4dc0130df349-88558217" class="lu_back"><img src="images/left-arrow.png" alt="" class="image-13"></div><img src="images/lucalogo.png" width="96" height="96" id="w-node-abb5a0981aa6-88558217" alt="" class="lu_logo_small">
      <div id="w-node-7ca08c872b9c-88558217" class="lu_confirmation_tick"><img src="images/tick3.gif" alt="" class="tick"></div>
    </div>
  </div>
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
