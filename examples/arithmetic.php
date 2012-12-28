<?php
	require_once('../lib/numbers.php');

	// Let's consider some really basic examples.

	echo '<pre>';
	
	// Adding up elements in an array. But wait! First we need an array...
	// Let's get a random sample of 50 values, in the range 0, 100.
	$random = NumbersStatistic::randomSample(0, 100, 50);
	echo 'Random = {' . implode(', ', $random) . "}\n";

	// Add them up...
	$sum = NumbersBasic::sum($random);
	echo 'Sum of Random = ' . $sum . "\n";

	// We can do some other cool stuff as well. Like find the GCD between
	// two integers.
	$gcd = NumbersBasic::gcd(100, 10);
	echo 'GCD amongst 100 and 10 = ' . $gcd;
	
	echo '</pre>';