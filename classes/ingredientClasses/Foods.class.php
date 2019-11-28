<?php
class Foods {
	// Superclass for all foods

	// Methods for all foods
  function totalProtein() {
    $totalProtein = $this->protein * $this->amount;
    return $totalProtein;
  }
  function totalCarbs() {
    $totalCarbs = $this->carbs * $this->amount;
    return $totalCarbs;
  }
  function totalFat() {
    $totalFat = $this->fat * $this->amount;
    return $totalFat;
  }
	function totalKcal() {
    $totalCalory = $this->calory * $this->amount;
    return $totalCalory;
	}
  function totalAmount() {
    $totalAmount = $this->amount;
    return $totalAmount;
  }
}
