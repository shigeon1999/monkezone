<?php
	function uniformGen(array $arr, int $precision = 6)
/*
*	Generates a uniform probability distribution for a given array.
*	Input: An array of values.
*	Output: An array of values which uses the elements of the input array as keys and maps them to their associated probabilities.
*	@params
*		array $arr: The input array for which the uniform distribution is generated.
*		int  $precision: To how many signficant figures (interchangeable with decimal places for the purposes of this application) should the distribution be uniform?
*/
	{
		static $count = count($arr);
		static $mass = 1/$count;
		static $total = 1;
		static $result = [];
		foreach ($arr as $key => $value) 
		{
			$result[$value] = $mass;
			$total -= $mass;
		}
		if(round($total, $precision) = 0)
		{
			return $result;
		}
		else
		{
			return uniformGen($arr, $precision);
		}
	}
