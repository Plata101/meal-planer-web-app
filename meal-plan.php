<?php
session_start();
require("prefs/credentials.php");
require("classes/Count_calories.class.php");
require("classes/DatabaseConnection.class.php");

$errorMsg_required = "E-MAIL ADDRESS";

if (isset($_POST['go'])) {
include("validation/validate_email.php");
}

?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon May 27 2019 16:37:33 GMT+0000 (UTC)  -->
<html data-wf-page="5cebfef55abdf63140558216" data-wf-site="5cb33acc4e458427ca06e14c">
<head>
  <meta charset="utf-8">
  <title>Meal_Plan</title>
  <meta content="Meal_Plan" property="og:title">
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
      <div id="w-node-90292d09de6d-40558216" class="lu_progressbar_wrapper">
        <div class="lu_perc_progbar">
          <p class="paragraph pos4 pos5">82.5%</p>
        </div>
        <div class="lu_progress_line">
          <div class="lu_progress_1 pa_line wa_line wa_line2 wa_line3 wa_line4"></div>
        </div>
        <div class="lu_progress_bar">
          <div class="lu_gender lu_gender_no"><img src="images/guygirl.png" srcset="images/guygirl-p-500.png 500w, images/guygirl-p-800.png 800w, images/guygirl.png 905w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 52.765625px, (max-width: 991px) 64.640625px, 85.75px" alt="" class="lu_gender_pic"></div>
          <div class="lu_weight pa lu_weight_no2"><img src="images/weight-silhouette-for-medical-sport-practice.png" alt="" class="weight"></div>
          <div class="lu_desk wa"><img src="images/man-in-office-desk-with-computer.png" alt="" class="lu_desk_pic"></div>
          <div class="lu_weight lu_scale measurement_scale"><img src="images/icon.png" alt="" class="scale"></div>
          <div class="lu_meal mealplan_ready lu_meal_yes"><img src="images/diet.png" alt="" class="lu_meal_pic"></div>
          <div class="lu_pdf"><img src="images/pdf.png" alt="" class="lu_pdf_pic"></div>
        </div>
      </div><a id="w-node-3c9a7e610f12-40558216" href="thank-you.html" class="measurement_link thank_link w-inline-block"></a>
      <h2 id="w-node-9a872a11bd4a-40558216" class="pa_free_time measure">MEAL PLAN</h2><img src="images/luca_backside.jpg" srcset="images/luca_backside-p-500.jpeg 500w, images/luca_backside-p-800.jpeg 800w, images/luca_backside.jpg 1080w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 110px, (max-width: 991px) 170px, 180px" id="w-node-29be87591356-40558216" alt="" class="lu_luca_back">
      <div id="w-node-79c4d4b52fbe-40558216" class="lu_question">
        <p class="paragraph-2">?</p>
      </div>
      <p id="w-node-8269e2b89021-40558216" class="lu_mealplan_text">YOUR MEAL PLAN IS READY. ENTER YOUR MAIL, PRESS CONTINUE AND A PDF WILL BE SENT TO YOU.</p>
      <p id="w-node-466cb841c177-40558216" class="lu_contact_faq">CONTACT<br>FAQ<br>COOKIE POLICY</p>
      <div id="w-node-4dc0130df349-40558216" class="lu_back"><img src="images/left-arrow.png" alt="" class="image-13"></div>
      <div id="w-node-ae1caf14a240-40558216" class="form-block lu_form_mealplan w-form">
        <form method="post" action="meal-plan.php" id="wf-form-Email-Form" name="wf-form-Email-Form" data-name="Email Form" class="form lu_meaplan">
					<input type="email" class="lu_no_activ lu_work_out_1 lu_measurement_target lu_email w-input" maxlength="256" name="e-mail" data-name="e-mail" placeholder="<?=$errorMsg_required?>" id="e-mail">
					<input type="submit" name="go" value="CONTINUE" data-wait="Please wait..." class="lu_no_activ lu_daily_workout lu_measurement_continue w-button">
				</form>
        <!-- <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div> -->
      </div><img src="images/lucalogo.png" width="96" height="96" id="w-node-abb5a0981aa6-40558216" alt="" class="lu_logo_small"></div>
  </div>
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
