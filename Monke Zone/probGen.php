<?php
	require_once("randX.php");	#"randX()" generates a random floating point number in a specified range.
	// require_once("../displayArray.php");  
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*
*	Generates a valid, random probability distribution for a given array of elements, that can be used in conjunction with "probSelect()".
*	Input: 
*		$arr: An array of elements.
*		$control: A value that decides how much mass is allowed to be unilaterally dumped onto one element. A high value would permit distributions where most of the mass is concentrated on one element. 
		If an invalid value is provided, the default is used.
*	Output: 
*		An associative array where the keys are the elements in the original array, and the values are their probabilities. 
*	@params 
*		array $arr:	An array of elements for which the probability distribution would be generated. 
*		float $control: A variable which limits the inequality of the probability distribution.
*/
	function probGen(array $arr, float $control = 0.01)	
	{
		$control = ($control <= 1 && $control >= 0)?($control):(0.00001);	#Use the default value if an invalid number is supplied.
		static $result = [];	#Initialises $result with an empty array on first function call.
		static $max = 1;	#Initialises $max with 1 on first function call.
		foreach ($arr as $value) 
		{
			$x = randX(0, $max);	#Random probability value.
			$result[$value] = ($result[$value] + $x)??0;	#Initialise the array with 0 on first call, and on subsequent calls increment by $x to assign probability mass.
			$max -= $x;		#Ensures that the probability never sums to more than one.
		}
/*
*	After the execution of the above code, there would be some leftover probability mass. 
*	The code below adds it to a random element.
*/
		$var = array_values($arr);
		if($max <= $control)	#To limit concentration of most of the probability mass in one variable.
		{
			$result[$var[rand(0,(count($var)-1))]] += $max;	#Selects a random key and adds $max to it.
			// print("<br>Sum: ".array_sum($result)."<br>");
			return $result;
		}
		else
		{
			return probGen($arr, $control);	
		}
	}