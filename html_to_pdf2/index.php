<?php
session_start();
//include autoloader
require_once 'dompdf/autoload.inc.php';
// all calories counted together from user input
$total = $_SESSION['total'];
$needed = $_SESSION['needed'];
$target = $_SESSION['target'];
// choose the right base Meal_Plan
include 'food_html/all_food_classes.php';
include 'food_html/baseMealplan.php';
//include all recipe variables & function
include 'food_html/bolognese.php';
include 'food_html/breakfast_muesli.php';
include 'food_html/falafel.php';
include 'food_html/lentil_salad.php';
include 'food_html/pizza.php';
include 'food_html/power_bowl.php';
include 'food_html/power_muesli.php';
include 'food_html/tofu_cashew.php';
include 'food_html/tomato_soup.php';
// recalculate days in case of too much difference in weight/gain loss
if (isset($_SESSION['days'])) {
  $daysNeeded = $_SESSION['days'];
} else {
  $daysNeeded = 28;
}
// even out daily consumption / basemealplan difference with mixed nuts
$mixedNuts = round(($needed - $baseMealPlan) / 6.07);
$mixedNutsCalory = round($mixedNuts * 6.07, 2);
//total calory per day mealplan
$totalMonday = $mixedNutsCalory + $total_calory2 + $total_calory8 + $total_calory7 + $total_calory4;
$totalTuesday = $mixedNutsCalory + $total_calory2 + $total_calory4 + $total_calory7 + $total_calory3;
$totalWednesday = $mixedNutsCalory + $total_calory1 + $total_calory2 + $total_calory3 + $total_calory7;
$totalThursday = $mixedNutsCalory + $total_calory1 + $total_calory2 + $total_calory6 + $total_calory7;
$totalFriday = $mixedNutsCalory + $total_calory2 + $total_calory6 + $total_calory7 + $total_calory9;
$totalSaturday = $mixedNutsCalory + $total_calory2 + $total_calory5 + $total_calory7 + $total_calory9;
$totalSunday = $mixedNutsCalory + $total_calory2 + $total_calory5 + $total_calory7 + $total_calory8;
//average calory per day mealplan
$dailyAverage = round(($totalMonday + $totalTuesday + $totalWednesday + $totalThursday + $totalFriday + $totalSaturday + $totalSunday) / 7);
// reference the Dompdf namespace
use Dompdf\Dompdf;
// initialize dompdf /**
 $document = new Dompdf();

 $html = "
 <head>
   <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet'>
   <meta charset='utf-8'>
   <title></title>
   <style>
 .recipe {
 font-family: 'Lato', sans-serif;
 border-collapse: collapse;
 width: 100%;
 }

 h3, h1 {
 font-family: 'Lato', sans-serif;
 }
 h3 {
   font-weight: 400;
 }

 .recipe td, .recipe th {
 border: 1px solid #ddd;
 padding: 8px;
 }

 .recipe tr:nth-child(even){background-color: #f2f2f2;}

 .recipe tr:hover {background-color: #ddd;}

 .recipe th {
 width: 33%;
 padding-top: 12px;
 padding-bottom: 12px;
 text-align: left;
 background-color: #8BAB3F;
 color: white;
 }
 img {
   height: 270px;
   border-radius: 5px;
 }
 #first {
 width: 40%;
 }
#other {
width: 15%;
}

#logo_mealplan {
  width: 25%;
  height: 25%;
}
.page_break { page-break-after: always;
}
 </style>
 </head>
 <body>
 <center><h1>Meal Plan</h1></center>
 <center><img id='logo_mealplan' src='../images/lucalogo.png'></center>
 <h3>Welcome to your personal tailored Mealplan. This mealplan is basically laid out for one month
     or 28 days. However, to ensure a healthy weight gain or loss and to avoid a Jojo effect, the
     days to reach your goal will adjust automatically should you enter a target weight that differs
     a lot to your current weight.</h3>

 <h3>Current consumption per day: <strong>$total kcal</strong></h3>
 <h3>Needed consumption per day to reach your goal of <strong>$target kg</strong>: <strong>$needed kcal</strong></h3>
 <h3>Average according to mealplan: <strong>$dailyAverage kcal</strong></h3>
 <h3>Days needed to reach goal: <strong>$daysNeeded days</strong></h3>
 <div class='page_break'></div>
 <!-- Monday-->
 <table class='recipe'>
 <tr>
   <th>Monday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Tofu and cashew</td>
   <td>$total_calory8 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Lentil salad</td>
   <td>$total_calory4 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalMonday kcal</td>
 </tr>
 </table>
 <br>
 <!-- Tuesday -->
 <table class='recipe'>
 <tr>
   <th>Tuesday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Lentil salad</td>
   <td>$total_calory4 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Falafel</td>
   <td>$total_calory3 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalTuesday kcal</td>
 </tr>
 </table>
<div class='page_break'></div>
 <!-- Wednesday -->
 <table class='recipe'>
 <tr>
   <th>Wednesday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Falafel</td>
   <td>$total_calory3 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Vegan Bolognese with pasta, quinoa or brown rice</td>
   <td>$total_calory1 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalWednesday kcal</td>
 </tr>
 </table>
 <br>
 <!-- Thursday -->
 <table class='recipe'>
 <tr>
   <th>Thursday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Vegan Bolognese with pasta, quinoa or rice</td>
   <td>$total_calory1 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Power Bowl</td>
   <td>$total_calory6 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalThursday kcal</td>
 </tr>
 </table>
<div class='page_break'></div>
 <!-- Friday-->
 <table class='recipe'>
 <tr>
   <th>Friday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Power bowl</td>
   <td>$total_calory6 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Coconut tomato soup</td>
   <td>$total_calory9 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalFriday kcal</td>
 </tr>
 </table>
 <br>
 <!-- Saturday-->
 <table class='recipe'>
 <tr>
   <th>Saturday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Coconut tomato soup</td>
   <td>$total_calory9 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Vegan pizza</td>
   <td>$total_calory5 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalSaturday kcal</td>
 </tr>
 </table>
 <br>
 <!-- Sunday-->
 <table class='recipe'>
 <tr>
   <th>Sunday</th>
   <th>Meal</th>
   <th>Total Calories per Meal</th>
 </tr>
 <tr>
   <td>Breakfast:</td>
   <td>Breakfast muesli</td>
   <td>$total_calory2 kcal</td>
 </tr>
 <tr>
   <td>Lunch:</td>
   <td>Vegan Pizza</td>
   <td>$total_calory5 kcal</td>
 </tr>
 <tr>
   <td>Before dinner:</td>
   <td>Power muesli</td>
   <td>$total_calory7 kcal</td>
 </tr>
 <tr>
   <td>Dinner:</td>
   <td>Tofu and cashew</td>
   <td>$total_calory8 kcal</td>
 </tr>
 <tr>
   <td>Snack:</td>
   <td>$mixedNuts grams of mixed nuts</td>
   <td>$mixedNutsCalory kcal</td>
 </tr>
 <tr>
   <td></td>
   <td>Total calories per day</td>
   <td>$totalSunday kcal</td>
 </tr>
 </table>
<div class='page_break'></div>

<center><h1>Bolognese</h1></center>
<center><img src='food_pics/bolognese.jpeg'></center>
<br>
<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $pasta -> amount . " grams whole wheat pasta</td>
  <td>" . $pasta -> totalProtein() . "g</td>
  <td>" . $pasta -> totalCarbs() . "g</td>
  <td>" . $pasta -> totalFat() . "g</td>
  <td>" . $pasta -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $lupine -> amount . " grams of lupines</td>
  <td>" . $lupine -> totalProtein() . "g</td>
  <td>" . $lupine -> totalCarbs() . "g</td>
  <td>" . $lupine -> totalFat() . "g</td>
  <td>" . $lupine -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $tomato -> amount . " grams peeled tomatoes</td>
  <td>" . $tomato -> totalProtein() . "g</td>
  <td>" . $tomato -> totalCarbs() . "g</td>
  <td>" . $tomato -> totalFat() ."g</td>
  <td>" . $tomato -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $onion -> amount . " grams onion</td>
  <td>" . $onion -> totalProtein(). "g</td>
  <td>" . $onion -> totalCarbs(). "g</td>
  <td>" . $onion -> totalFat(). "g</td>
  <td>" . $onion -> totalKcal(). "kcal</td>
</tr>
<tr>
  <td>1 garlic glove (3grams)</td>
  <td>0g</td>
  <td>1g</td>
  <td>0g</td>
  <td>4kcal</td>
</tr>
<tr>
  <td>1 carrot (100grams)</td>
  <td>0.9g</td>
  <td>10g</td>
  <td>0.2g</td>
  <td>41kcal</td>
</tr>
<tr>
  <td>Tomato paste</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>4 tablespoons italian herbs (rosemary, marjoram, oregano)</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>1 pinch of salt and pepper</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>1 tablespoon thyme</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>100 grams of white potatoes</td>
  <td>1.7g</td>
  <td>16g</td>
  <td>0.1g</td>
  <td>68.66kcal</td>
</tr>
<tr>
  <td>" . $tofu -> amount . " grams of tofu</td>
  <td>" . $tofu -> totalProtein() . "g</td>
  <td>" . $tofu -> totalCarbs() . "g</td>
  <td>" . $tofu -> totalFat() . "g</td>
  <td>" . $tofu -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein1 . "g</td>
  <td>" . $total_carbs1 . "g</td>
  <td>" . $total_fat1 . "g</td>
  <td>" . $total_calory1 . "kcal</td>
</tr>
</table>
<h3>Blend the onion, garlic, the italian herb, carrot and thyme. Put them in a saicepan and heat them with the chopped tomatoes. Add a little bit of tomato paste,
the lupines and water. Add a pinch of salt and pepper. Be careful, the pan will get dry fast. Try adding more water if needed. Cook for 40min. Cook your paste in
in a separate saucepan. Drain the pasta in a large serving bowl and top with the Bolognese sauce.</h3>
<div class='page_break'></div>

<center><h1>Breakfast Muesli</h1></center>
<center><img src='food_pics/muesli.jpg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>1 fresh chopped apple (100 grams)</td>
  <td>0.3g</td>
  <td>14g</td>
  <td>0.2g</td>
  <td>51kcal</td>
</tr>
<tr>
  <td>10 grams of grounded flax seeds</td>
  <td>1.8g</td>
  <td>2.9g</td>
  <td>4.2g</td>
  <td>53kcal</td>
</tr>
<tr>
  <td>" . $almonds -> amount . " grams almonds</td>
  <td>" . $almonds -> totalProtein() . "g</td>
  <td>" . $almonds -> totalCarbs() . "g</td>
  <td>" . $almonds -> totalFat() . "g</td>
  <td>" . $almonds -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $quinoa -> amount . " grams of quinoa flakes</td>
  <td>" . $quinoa -> totalProtein() . "g</td>
  <td>" . $quinoa -> totalCarbs() . "g</td>
  <td>" . $quinoa -> totalFat() . "g</td>
  <td>" . $quinoa -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>300ml of almond milk</td>
  <td>1.2g</td>
  <td>1.2g</td>
  <td>3.1g</td>
  <td>38kcal</td>
</tr>

<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein2 . "g</td>
  <td>" . $total_carbs2 . "g</td>
  <td>" . $total_fat2 . "g</td>
  <td>" . $total_calory2 . "kcal</td>
</tr>
</table>
<div class='page_break'></div>



<center><h1>Falafel</h1></center>
<center><img src='food_pics/falafel.jpeg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $grain_flour -> amount . " grams whole grain spelt flour</td>
  <td>" . $grain_flour -> totalProtein() . "g</td>
  <td>" . $grain_flour -> totalCarbs() . "g</td>
  <td>" . $grain_flour -> totalFat() . "g</td>
  <td>" . $grain_flour -> totalFat() . "kcal</td>
</tr>

<tr>
  <td>100 grams of peppers</td>
  <td>2g</td>
  <td>9g</td>
  <td>0.2g</td>
  <td>40kcal</td>
</tr>
<tr>
  <td>50 grams zucchini</td>
  <td>0.6g</td>
  <td>1.55g</td>
  <td>0.15g</td>
  <td>8.5kcal</td>
</tr>
<tr>
  <td>" . $fa_onion -> amount . " grams onion</td>
  <td>" . $fa_onion -> totalProtein() . "g</td>
  <td>" . $fa_onion -> totalCarbs() . "g</td>
  <td>" . $fa_onion -> totalFat() . "g</td>
  <td>" . $fa_onion -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>1 pinch of garlic powder & dried oregano / marjoram</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>1/2 teaspoon salt & little bit of water</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>" . $pumpkin -> amount . " grams pumpkin seeds</td>
  <td>" . $pumpkin -> totalProtein() . "g</td>
  <td>" . $pumpkin -> totalCarbs() . "g</td>
  <td>" . $pumpkin -> totalFat() . "g</td>
  <td>" . $pumpkin -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein3 . "g</td>
  <td>" . $total_carbs3 . "g</td>
  <td>" . $total_fat3 . "g</td>
  <td>" . $total_calory3 . "kcal</td>
</tr>
</table>
<h3>Pour the flour into a bowl. Blend all of the other ingredients along with the seeds in the blender and add them to the flour. Add just a little bit of water
until your get a homogenous mass. You can then form the mass into small balls. Bake at 180deg for 20 minutes in the oven.</h3>
<div class='page_break'></div>

<center><h1>Lentil Salad</h1></center>
<center><img src='food_pics/lentil.jpeg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $lentils -> amount . " grams lentil cooked</td>
  <td>" . $lentils -> totalProtein() . "g</td>
  <td>" . $lentils -> totalCarbs() . "g</td>
  <td>" . $lentils -> totalFat() . "g</td>
  <td>" . $lentils -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>100 grams beetroot</td>
  <td>3.2g</td>
  <td>20g</td>
  <td>0.4g</td>
  <td>43kcal</td>
</tr>
<tr>
  <td>100 grams peppers</td>
  <td>2g</td>
  <td>9g</td>
  <td>0.2g</td>
  <td>40kcal</td>
</tr>
<tr>
  <td>50 grams radishes</td>
  <td>0.4g</td>
  <td>1.7g</td>
  <td>0g</td>
  <td>8kcal</td>
</tr>
<tr>
  <td>50 grams spinach leaves</td>
  <td>1.5g</td>
  <td>1.8g</td>
  <td>0.2g</td>
  <td>11.5kcal</td>
</tr>
<tr>
  <td>50 grams leaf lettuce</td>
  <td>0.7g</td>
  <td>1.1g</td>
  <td>0.1g</td>
  <td>16kcal</td>
</tr>
<tr>
  <td>50 grams carrots</td>
  <td>0.5g</td>
  <td>5g</td>
  <td>0.1g</td>
  <td>20kcal</td>
</tr>
<tr>
  <td>100 grams fresh tomato</td>
  <td>0.9g</td>
  <td>3.9g</td>
  <td>0.2g</td>
  <td>18kcal</td>
</tr>
<tr>
  <td>7 (100ml) tablespoona of apple vinegar</td>
  <td>0g</td>
  <td>0.9g</td>
  <td>0g</td>
  <td>22kcal</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein4 . "g</td>
  <td>" . $total_carbs4 . "g</td>
  <td>" . $total_fat4 . "g</td>
  <td>" . $total_calory4 . "kcal</td>
</tr>
</table>
<div class='page_break'></div>
<center><h1>Power Bowl</h1></center>
<center><img src='food_pics/powerbowl.png'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>

<tr>
  <td>80 grams quinoa</td>
  <td>3.52g</td>
  <td>17.03g</td>
  <td>1.53g</td>
  <td>96kcal</td>
</tr>
<tr>
  <td>" . $kidney -> amount . " grams kidney beans</td>
  <td>" . $kidney -> totalProtein() . "g</td>
  <td>" . $kidney -> totalCarbs() . "g</td>
  <td>" . $kidney -> totalFat() . "g</td>
  <td>" . $kidney -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $wpotatoes -> amount . " grams white potatoes</td>
  <td>" . $wpotatoes -> totalProtein() . "g</td>
  <td>" . $wpotatoes -> totalCarbs() . "g</td>
  <td>" . $wpotatoes -> totalFat() . "g</td>
  <td>" . $wpotatoes -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>50 grams cherry tomatoes</td>
  <td>0.65g</td>
  <td>3.35g</td>
  <td>0</td>
  <td>14kcal</td>
</tr>
<tr>
  <td>50 grams peas</td>
  <td>2.5g</td>
  <td>7g</td>
  <td>0.2g</td>
  <td>40.5kcal</td>
</tr>
<tr>
  <td>" . $po_tofu -> amount . " grams of tofu</td>
  <td>" . $po_tofu -> totalProtein() . "g</td>
  <td>" . $po_tofu -> totalCarbs() . "g</td>
  <td>" . $po_tofu -> totalFat() . "g</td>
  <td>" . $po_tofu -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>50 grams broccoli</td>
  <td>1.4g</td>
  <td>3.5g</td>
  <td>0.2g</td>
  <td>17kcal</td>
</tr>
<tr>
  <td>50 grams aragula</td>
  <td>1.3g</td>
  <td>1.85g</td>
  <td>0.35g</td>
  <td>12.5kcal</td>
</tr>
<tr>
  <td>" . $po_pumpkin -> amount . " grams pumpkin seeds</td>
  <td>" . $po_pumpkin -> totalProtein() . "g</td>
  <td>" . $po_pumpkin -> totalCarbs() . "g</td>
  <td>" . $po_pumpkin -> totalFat() . "g</td>
  <td>" . $po_pumpkin -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $po_cashew -> amount . " grams cashew nuts</td>
  <td>" . $po_cashew -> totalProtein() . "g</td>
  <td>" . $po_cashew -> totalCarbs() . "g</td>
  <td>" . $po_cashew -> totalFat() . "g</td>
  <td>" . $po_cashew -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein6 . "g</td>
  <td>" . $total_carbs6 . "g</td>
  <td>" . $total_fat6 . "g</td>
  <td>" . $total_calory6 . "kcal</td>
</tr>
</table>
<h3>Cook the quinoa and beans. Cook or steam all the other ingredients separately (besides arugula, seeds and nuts). Put all the ingredients in a bowl and enjoy.
</h3>

<div class='page_break'></div>
<center><h1>Power Muesli</h1></center>
<center><img src='food_pics/muesli.jpg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $banana -> amount . " grams banana</td>
  <td>" . $banana -> totalProtein() . "g</td>
  <td>" . $banana -> totalCarbs() . "g</td>
  <td>" . $banana -> totalFat() . "g</td>
  <td>" . $banana -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>100 grams of frozen blueberries</td>
  <td>0.7g</td>
  <td>14g</td>
  <td>0.3g</td>
  <td>57kcal</td>
</tr>
<tr>
  <td>" . $walnuts -> amount . " grams walnuts</td>
  <td>" . $walnuts -> totalProtein() . "g</td>
  <td>" . $walnuts -> totalCarbs() . "g</td>
  <td>" . $walnuts -> totalFat() . "g</td>
  <td>" . $walnuts -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>20 grams dried inca berries</td>
  <td>0.38g</td>
  <td>2.2g</td>
  <td>0.14g</td>
  <td>10.6kcal</td>
</tr>
<tr>
  <td>" . $lupin_flour -> amount . " grams lupin flour</td>
  <td>" . $lupin_flour -> totalProtein() . "g</td>
  <td>" . $lupin_flour -> totalCarbs() . "g</td>
  <td>" . $lupin_flour -> totalFat() . "g</td>
  <td>" . $lupin_flour -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $hemp -> amount . " grams hemp seeds</td>
  <td>" . $hemp -> totalProtein() . "g</td>
  <td>" . $hemp -> totalCarbs() . "g</td>
  <td>" . $hemp -> totalFat() . "g</td>
  <td>" . $hemp -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $chia -> amount . " grams chia seeds</td>
  <td>" . $chia -> totalProtein() . "g</td>
  <td>" . $chia -> totalCarbs() . "g</td>
  <td>" . $chia -> totalFat() . "g</td>
  <td>" . $chia -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>5 grams grounded flax seeds</td>
  <td>0.9g</td>
  <td>1.45g</td>
  <td>2.1g</td>
  <td>26.7kcal</td>
</tr>
<tr>
  <td>20 grams goji berries</td>
  <td>2.2g</td>
  <td>4.2g</td>
  <td>0.2g</td>
  <td>16.6kcal</td>
</tr>
<tr>
  <td>10 grams quinoa flakes</td>
  <td>1.42g</td>
  <td>6.78g</td>
  <td>0.53g</td>
  <td>35.71kcal</td>
</tr>
<tr>
  <td>" . $cocoa -> amount . " grams raw cocoa powder</td>
  <td>" . $cocoa -> totalProtein() . "g</td>
  <td>" . $cocoa -> totalCarbs() . "g</td>
  <td>" . $cocoa -> totalFat() . "g</td>
  <td>" . $cocoa -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>300ml almond milk</td>
  <td>1.2g</td>
  <td>1.2g</td>
  <td>3.1g</td>
  <td>38kcal</td>
</tr>

<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein7 . "g</td>
  <td>" . $total_carbs7 . "g</td>
  <td>" . $total_fat7 . "g</td>
  <td>" . $total_calory7 . "kcal</td>
</tr>
</table>
<div class='page_break'></div>
<center><h1>Tofu Cashew</h1></center>
<center><img src='food_pics/tofucashew.jpg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $to_tofu -> amount . " grams of tofu</td>
  <td>" . $to_tofu -> totalProtein() . "g</td>
  <td>" . $tofu -> totalCarbs() . "g</td>
  <td>" . $tofu -> totalFat() . "g</td>
  <td>" . $tofu -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>100 grams of peppers</td>
  <td>2g</td>
  <td>9g</td>
  <td>0.2g</td>
  <td>40kcal</td>
</tr>
<tr>
  <td>" . $to_wpotatoes -> amount . " grams white potatoes</td>
  <td>" . $to_wpotatoes -> totalProtein() . "g</td>
  <td>" . $to_wpotatoes -> totalCarbs() . "g</td>
  <td>" . $to_wpotatoes -> totalFat() . "g</td>
  <td>" . $to_wpotatoes -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>" . $spotatoes -> amount . " grams sweet potatoes</td>
  <td>" . $spotatoes -> totalProtein() . "g</td>
  <td>" . $spotatoes -> totalCarbs() . "g</td>
  <td>" . $spotatoes -> totalFat() . "g</td>
  <td>" . $spotatoes -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>50 grams broccoli</td>
  <td>1.4g</td>
  <td>3.5g</td>
  <td>0.2g</td>
  <td>17kcal</td>
</tr>
<tr>
  <td>150 grams zucchini</td>
  <td>1.8g</td>
  <td>4.65g</td>
  <td>0.45g</td>
  <td>25.5kcal</td>
</tr>
<tr>
  <td>1 garlic glove (3grams)</td>
  <td>0g</td>
  <td>1g</td>
  <td>0g</td>
  <td>4</td>
</tr>
<tr>
  <td>a handfull of cashews (30grams)</td>
  <td>5.4g</td>
  <td>9g</td>
  <td>13.2g</td>
  <td>165.9kcal</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein8 . "g</td>
  <td>" . $total_carbs8 . "g</td>
  <td>" . $total_fat8 . "g</td>
  <td>" . $total_calory8 . "kcal</td>
</tr>
</table>
<h3>Use the water frying technique to fry or steam the veggies. Add salt and pepper and raw nuts</h3>
<div class='page_break'></div>

<center><h1>Coconut Tomato Soup</h1></center>
<center><img src='food_pics/tomatosoup.jpeg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th class='other'>Protein</th>
  <th class='other'>Carbohydrats</th>
  <th class='other'>Fat</th>
  <th class='other'>Calories</th>
</tr>
<tr>
  <td>" . $coconutMilk -> amount . " ml of organic coconut milk</td>
  <td>" . $coconutMilk -> totalProtein() . "g</td>
  <td>" . $coconutMilk -> totalCarbs() . "g</td>
  <td>" . $coconutMilk -> totalFat() . "g</td>
  <td>" . $coconutMilk -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>200 ml chopped tomatoes (tinned) </td>
  <td>1.8g</td>
  <td>7.8g</td>
  <td>0.4g</td>
  <td>36kcal</td>
</tr>
<tr>
  <td>200 g champignon mushrooms</td>
  <td>6.18g</td>
  <td>6.52g</td>
  <td>0.64g</td>
  <td>44kcal</td>
</tr>
<tr>
  <td>200 g zucchini</td>
  <td>2.4g</td>
  <td>6.2g</td>
  <td>0.6g</td>
  <td>34kcal</td>
</tr>
<tr>
  <td>" . $poppy -> amount . " grams poppy seeds</td>
  <td>" . $poppy -> totalProtein() . "g</td>
  <td>" . $poppy -> totalCarbs() . "g</td>
  <td>" . $poppy -> totalFat() . "g</td>
  <td>" . $poppy -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>1 medium onion (200grams)</td>
  <td>2.2g</td>
  <td>18g</td>
  <td>0.2g</td>
  <td>80kcal</td>
</tr>
<tr>
  <td>1 pinch of salt and black pepper</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>" . $coconutFlakes -> amount . " grams of unsweetened coconut flakes</td>
  <td>" . $coconutFlakes -> totalProtein() . "g</td>
  <td>" . $coconutFlakes -> totalCarbs() . "g</td>
  <td>" . $coconutFlakes -> totalFat() . "g</td>
  <td>" . $coconutFlakes -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein9 . "g</td>
  <td>" . $total_carbs9 . "g</td>
  <td>" . $total_fat9 . "g</td>
  <td>" . $total_calory9 . "kcal</td>
</tr>
</table>
<h3>Heat the coconut milk and the chopped tomatoes in a saucepan, add onions and then puree with a wand mixer for about 1 min. Add all the other ingredients to the sauce and cook for about 15 min. Serve with coconut flakes. </h3>

<div class='page_break'></div>
<center><h1>Pizza</h1></center>
<center><img src='food_pics/pizza.jpeg'></center>
<br>

<table class='recipe'>
<tr>
  <th id='first'>Ingredients</th>
  <th id='other'>Protein</th>
  <th id='other'>Carbohydrats</th>
  <th id='other'>Fat</th>
  <th id='other'>Calories</th>
</tr>
<tr>
  <td>" . $buckwheat -> amount . " grams of buckwheat flour</td>
  <td>" . $buckwheat -> totalProtein() . "g</td>
  <td>" . $buckwheat -> totalCarbs() . "g</td>
  <td>" . $buckwheat -> totalFat() . "g</td>
  <td>" . $buckwheat -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>20 grams chia seeds</td>
  <td>3.4</td>
  <td>8.4g</td>
  <td>6.2g</td>
  <td>97.2kcal</td>
</tr>
<tr>
  <td>20 grams hemp seeds</td>
  <td>6.31g</td>
  <td>1.73g</td>
  <td>9.74g</td>
  <td>110.6kcal</td>
</tr>
<tr>
  <td>1 tablespoon nutritional yeast (15 grams)</td>
  <td>3.75g</td>
  <td>2.34g</td>
  <td>0.5g</td>
  <td>28.12kcal</td>
</tr>
<tr>
  <td>100 g mushrooms champignons</td>
  <td>3.09g</td>
  <td>3.26g</td>
  <td>0.32g</td>
  <td>22kcal</td>
</tr>
<tr>
  <td>100 grams peppers</td>
  <td>2g</td>
  <td>9g</td>
  <td>0.2g</td>
  <td>40kcal</td>
</tr>
<tr>
  <td>1 pinch of salt and black pepper</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>0.1l water</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>" . $cashew -> amount . " grams cashew nuts</td>
  <td>" . $cashew -> totalProtein() . "g</td>
  <td>" . $cashew -> totalCarbs() . "g</td>
  <td>" . $cashew -> totalFat() . "g</td>
  <td>" . $cashew -> totalKcal() . "kcal</td>
</tr>
<tr>
  <td>1 garlic glove (3grams)</td>
  <td>0g</td>
  <td>1g</td>
  <td>0g</td>
  <td>4kcal</td>
</tr>
<tr>
  <td>2 tablespoon nutritional yeast</td>
  <td>7.5g</td>
  <td>4.68g</td>
  <td>1g</td>
  <td>56.24g</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
<td>Pizza Sauce</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
  <td>2 tablespoons of fresh or dried oregano</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td>400 grams peeled tomatoes</td>
  <td>3.6g</td>
  <td>15.6g</td>
  <td>0.8g</td>
  <td>72kcal</td>
</tr>
<tr>
  <td>1 pinch of salt</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
  <td>-</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Total</td>
  <td>" . $total_protein5 . "g</td>
  <td>" . $total_carbs5 . "g</td>
  <td>" . $total_fat5 . "g</td>
  <td>" . $total_calory5 . "kcal</td>
</tr>

</table>
<h3>Mix the flour, spices and baking powder. Then, add the water, but be careful, maybe you need less water. Just add as much as it needs until it is not dry anymore and it sticks together when kneading. Add some flour onto the counter top, take the dough and knead it for 3 minutes. Form a ball with the dough, roll it out until it gets a little thinner and form a pizza-like form. Prepare sauce by adding tomato sauce to a mixing bowl and adding oregano and salt to taste. Adjust seasonings as needed. Set aside. Top the dough with desired amount of tomato sauce. Bake at 200° C for 25-30 mins in the oven. Serve with veggies, sprouts and parmesan.
</h3>

 </body>
 ";

$document->loadHtml($html);
// $page = file_get_contents("index.html");
// $document->loadHtml($page);

//set page size and orientation

$document->setPaper('A4', 'portrait');

// Render to HTML as PDF

$document->render();

// Create a random name for PDF

$filename = uniqid('Meal_Plan_', true) . '.pdf';

//Save output of generated pdf

$output = $document->output();
file_put_contents("mealplans/$filename", $output);

$_SESSION['filename'] = $filename;
header("Location: ../meal-plan.php");

 ?>
