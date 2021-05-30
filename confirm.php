<?php
/*
*	Confirms that the supplied array has a valid probability distribution.
*	Input: 
*		An associative array that maps elements to their associated probabilites.
*		(Optional): Precision used for validation.
*	Output: 
*		Boolean value indicating validity of the probability distribution.
*	@params:
*		array $arr: The input array that forms the probability distribution to be validated.
*		int  $precision: To how many signficant figures (interchangeable with decimal places for the purposes of this application) should the distribution be validated?
*/
	function confirm(array $arr, int $precision = 6)
	{
		// print("SUM: ".array_sum($arr)."<br>");
		return (round(array_sum($arr), $precision) == 1);
	}