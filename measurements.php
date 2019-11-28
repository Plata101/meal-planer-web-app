<?php
session_start();
require("classes/Count_calories.class.php");
if (isset($_POST['go'])) {
		$instance = new CountCalories();
		$weight = $_POST['weight'];
		$height = $_POST['height'];
		$age = $_POST['age'];
    $targetWeight = $_POST['target'];
		$gender = $_SESSION['gender'];
    $daily = $_SESSION['daily'];
    $physical = $_SESSION['physical'];
		$result = $instance -> CalculateConsumption($weight, $height, $age, $gender, $daily, $physical);
		$additional_calories = $instance -> CalculateTarget($weight, $targetWeight, $result);
		// if daily consumption should be more or less than 1000kcal, daily duration will be
		// adjusted from 28 days to days = $calories / 1000kcal.

		// weight gain
		if (($targetWeight - $weight) > 4) {
			$days = $instance -> ReCalculateDays($weight, $targetWeight);
			$_SESSION['days'] = $days;
			$additional_calories = 1000 + $result;
		}
		// // weight loss
		if (($targetWeight - $weight) < -4) {
			$days = $instance -> ReCalculateDaysMinus($weight, $targetWeight);
			$_SESSION['days'] = $days;
			$additional_calories = -1000 + $result;
		}
		// since the mealplan only goes as low as 1884 calories, the user will be directed to
		// 404 page, if the target calory consumption per day should be lower.
		if ($additional_calories < 1884) {
			$_SESSION['message'] = "WE ARE TERRIBLY SORRY!! :( Your Goal can unfortunately not be reached with our mealplaner. Please consider consulting a nutrion professional";
			header("Location: 404.php");
		} else {
    $_SESSION['total'] = $result;
		$_SESSION['needed'] = $additional_calories;
		$_SESSION['target'] = $targetWeight - $weight;
		header("Location: html_to_pdf2/index.php");
	}
}
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Mon May 27 2019 16:37:33 GMT+0000 (UTC)  -->
<html data-wf-page="5cebfef55abdf6435e558215" data-wf-site="5cb33acc4e458427ca06e14c">
<head>
  <meta charset="utf-8">
  <title>Measurements</title>
  <meta content="Measurements" property="og:title">
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
  <div class="lu_main_container" id="lu_main_container">
    <div class="w-layout-grid grid">
      <div id="w-node-90292d09de6d-5e558215" class="lu_progressbar_wrapper">
        <div class="lu_perc_progbar">
          <p class="paragraph pos4">66%</p>
        </div>
        <div class="lu_progress_line">
          <div class="lu_progress_1 pa_line wa_line wa_line2"></div>
        </div>
        <div class="lu_progress_bar">
          <div class="lu_gender lu_gender_no"><img src="images/guygirl.png" srcset="images/guygirl-p-500.png 500w, images/guygirl-p-800.png 800w, images/guygirl.png 905w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 52.765625px, (max-width: 991px) 64.640625px, 85.75px" alt="" class="lu_gender_pic"></div>
          <div class="lu_weight pa"><img src="images/weight-silhouette-for-medical-sport-practice.png" alt="" class="weight"></div>
          <div class="lu_desk wa"><img src="images/man-in-office-desk-with-computer.png" alt="" class="lu_desk_pic"></div>
          <div class="lu_weight lu_scale measurement_scale"><img src="images/icon.png" alt="" class="scale"></div>
          <div class="lu_meal"><img src="images/diet.png" alt="" class="lu_meal_pic"></div>
          <div class="lu_pdf"><img src="images/pdf.png" alt="" class="lu_pdf_pic"></div>
        </div>
      </div><a id="w-node-3c9a7e610f12-5e558215" href="meal-plan.html" class="measurement_link w-inline-block"></a>
      <h2 id="w-node-9a872a11bd4a-5e558215" class="pa_free_time measure">MEASUREMENTS</h2><img src="images/luca_backside.jpg" srcset="images/luca_backside-p-500.jpeg 500w, images/luca_backside-p-800.jpeg 800w, images/luca_backside.jpg 1080w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 110px, (max-width: 991px) 170px, 180px" id="w-node-29be87591356-5e558215" alt="" class="lu_luca_back">
      <div id="w-node-79c4d4b52fbe-5e558215" class="lu_question">
        <p class="paragraph-2">?</p>
      </div>
      <p id="w-node-466cb841c177-5e558215" class="lu_contact_faq">CONTACT<br>FAQ<br>COOKIE POLICY</p>
      <div id="w-node-4dc0130df349-5e558215" class="lu_back"><img src="images/left-arrow.png" alt="" class="image-13"></div>
      <div id="w-node-ae1caf14a240-5e558215" class="form-block lu_form_measure w-form">
        <form onsubmit="return validateForm()" method="post" action="measurements.php" id="wf-form-Email-Form" name="Form" data-name="Email Form" class="form">
						<input type="number" class="lu_no_activ lu_measure_age w-input" maxlength="256" name="age" data-name="age" placeholder="AGE" id="age-2">
						<input type="number" class="lu_no_activ lu_go lu_measurement_height w-input" maxlength="256" name="height" data-name="height" placeholder="HEIGHT" id="height">
						<input type="number" class="lu_no_activ lu_work_out_1 lu_measurement_target w-input" maxlength="256" name="weight" data-name="weight" placeholder="WEIGHT" id="weight">
						<input type="number" class="lu_no_activ lu_work_out_1 lu_measurement_target w-input" maxlength="256" name="target" data-name="target" placeholder="TARGET WEIGHT" id="target">
						<input type="submit" name="go" value="CONTINUE" data-wait="Please wait..." class="lu_no_activ lu_daily_workout lu_measurement_continue w-button" id="submit">
				</form>
      </div><img src="images/lucalogo.png" width="96" height="96" id="w-node-abb5a0981aa6-5e558215" alt="" class="lu_logo_small"></div>
  </div>
  <div class="loading_wait" id="loading_wait"><img src="images/scheiss_marc_lern_chli_photoshop.gif" alt="" class="image-14">
    <p class="paragraph-4">CREATING MEALPLAN ...</p>
  </div>
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
