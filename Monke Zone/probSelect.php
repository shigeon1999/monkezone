<?php
	require_once("confirm.php");

/*
*	A function to select an element from an array with indicated probabilites.
*	Input: 
*		An associative array whose keys are the elements to be selected from, and whose values are the associated probabilities.
*	Output: 
*		The selected element, or "NULL" if an invalid probability distribution was supplied. 
*	@params 
*		array $arr: The array containing the probability distribution.
*/	
	function probSelect(array $arr)	

	{
		if(confirm($arr))
		{
			$var = lcg_value();	#The random float that would be used to select the element.
			$sum = 0;
			foreach ($arr as $key => $value) 
			{
				$sum += $value;
				if($var <= $sum)
				{
					return $key;
				}
			}
		}
		else
		{
			print("ERROR!!! The supplied probability distribution must sum to 1. <br>");
			return null;
		}
	}