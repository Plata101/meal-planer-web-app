<?php
class CountCalories {
// Factor Kilo to Pounds
	public $weightFactor = 2.20462;
// Factor Centimeter to Inches
	public $heightFactor = 0.393701;

// Calculate basic calorie consumption / HARRIS BENEDICT FORMULA / Woman - 161 / Men + 5
	function CalculateConsumption($weight, $height, $age, $gender, $daily, $physical) {
			$result = round(((($weight * 10) + ($height * 6.25) - ($age * 5) + $gender + $physical)) * $daily,0);
			return $result;
	}

// Calculate calorie deduction/addition based on target weights, 1kg = 7000kcal

	function CalculateTarget($weight, $targetWeight, $result) {
			$calories = ($targetWeight - $weight) * 7000 / 28;
			$additional_calories = $result + $calories;
			return $additional_calories;
	}

// if daily consumption should be more or less than 1000kcal, daily duration will be
// adjusted from 28 days to days = $calories / 1000kcal.
	function ReCalculateDays($weight, $targetWeight) {
			$calories = ($targetWeight - $weight) * 7000;
			$days = $calories / 800;
			return $days;
}

// if daily consumption should be more or less than 1000kcal, daily duration will be
// adjusted from 28 days to days = $calories / 1000kcal.
	function ReCalculateDaysMinus($weight, $targetWeight) {
			$calories = abs($targetWeight - $weight) * 7000;
			$days = $calories / 800;
			return $days;
}

// Adding average Calories from Freetime activity
	function CalculateConsumptionFreetime($activity) {
			if ($activity == "NO PHYSICAL ACTIVITY") {$activity = "0";}
			if ($activity == "GO FOR WALKS REGULARLY") {$activity = 100;}
			if ($activity == "WORK OUT 1 – 2 TIMES A WEEK") {$activity = 200;}
			if ($activity == "WORK OUT 3 – 5 TIMES A WEEK") {$activity = 300;}
			if ($activity == "DO SPORTS ALMOST DAILY") {$activity = 400;}
			return $activity;
	}

	// Adding Calories from Daily activity / HARRIS BENEDICT FORMULA
	function CalculateConsumptionDaily($activity) {
			if ($activity == "MOSTLY SIT IN A CHAIR") {$activity = 1.4;}
			if ($activity == "DO ERRANDS SOMETIMES") {$activity = 1.6;}
			if ($activity == "SPEND THE DAY MAINLY ON FOOT") {$activity = 1.8;}
			if ($activity == "MANUAL LABOR") {$activity = 2;}
			return $activity;
	}

	// Counting overlay calories compared to current base meal plan
	// get the difference as Snack / Mixed nuts (6.07kcal), so that mealplan calories
	// match up target weight

	function CalculateDifference($baseMealPlan, $needed) {
		$difference = $needed - $baseMealPlan;
		$difference = $difference / 6.07;
		return $difference;
	}

}
