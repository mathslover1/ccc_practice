<?php
// Data Types: 

// $integerVar = 42;
// var_dump($integerVar); 

// $floatVar = 3.14;
// var_dump($floatVar);

// $stringVar = "Hello, PHP!";
// var_dump($stringVar);

// $boolVar = true;
// var_dump($boolVar);

// $arrayVar = array(1, 2, 3, "PHP");
// var_dump($arrayVar);

// $nullVar = null;
// var_dump($nullVar);


// Type Casting:

// $stringValue = "42";
// $intValue = (int)$stringValue;
// var_dump($intValue);

// $floatValue = 3.14;
// $intValue = (int)$floatValue;
// var_dump($intValue);

// $stringValue = "3.14";
// $floatValue = (float)$stringValue;
// var_dump($floatValue);

// $intValue = 0;
// $boolValue = (bool)$intValue;
// var_dump($boolValue);

// $stringValue = "1,2,3";
// $arrayValue = (array)$stringValue;
// var_dump($arrayValue);

// $nullVar = null;
// $intValue = (int)$nullVar;
// var_dump($intValue);


// Basic Arithmetic:

// $number = -42;
// $absValue = abs($number);
// var_dump($absValue);
   
// $number = 3.14;
// echo(ceil(0.60) . "<br>");
// echo(ceil(0.40) . "<br>");
// echo(ceil(5) . "<br>");
// echo(ceil(5.1) . "<br>");
// echo(ceil(-5.1) . "<br>");
// echo(ceil(-5.9));
// $ceilValue = ceil($number);
// var_dump($ceilValue);
 
// $number = 3.14;
// $floorValue = floor($number);
// echo(floor(0.60) . "<br>");
// echo(floor(0.40) . "<br>");
// echo(floor(5) . "<br>");
// echo(floor(5.1) . "<br>");
// echo(floor(-5.1) . "<br>");
// echo(floor(-5.9));
// var_dump($floorValue);

// $number = 3.75;
// $roundValue = round($number);
// echo(round(0.60) . "<br>");
// echo(round(0.50) . "<br>");
// echo(round(0.49) . "<br>");
// echo(round(-4.40) . "<br>");
// echo(round(-4.60));
// var_dump($roundValue);

// Power Functions:

// $base = 2;
// $exponent = 3;
// $powerValue = pow($base, $exponent);
// var_dump($powerValue);

// $number = 16;
// $sqrtValue = sqrt($number);
// var_dump($sqrtValue);

// Random Number Generation:

// $min = 1;
// $max = 100;
// $randomValue = rand($min, $max);
// var_dump($randomValue);

// Number Formatting:

// $number = 1234567.89;
// $decimals = 2;
// $decimal_point = '.';
// $thousands_separator = ',';
// $formattedNumber = number_format($number, $decimals, $decimal_point, $thousands_separator);
// var_dump($formattedNumber);

// Arithmetic Operators:

// $a = 5;
// $b = 3;
// $result = $a + $b;
// var_dump($result);

// $a = 10;
// $b = 4;
// $result = $a - $b;
// var_dump($result);

// $a = 6;
// $b = 7;
// $result = $a * $b;
// var_dump($result);

// $a = 15;
// $b = 3;
// $result = $a / $b;
// var_dump($result);

// $a = 20;
// $b = 7;
// $result = $a % $b;
// var_dump($result);

// $a = 2;
// $b = 3;
// $result = $a ** $b; 
// var_dump($result);

// Assignment Operators:

// $a = 10;
// $b = $a;
// var_dump($b);

// $a = 5;
// $b = 3;
// $a += $b;
// var_dump($a);

// $a = 10;
// $b = 4;
// $a -= $b;
// var_dump($a);

// $a = 6;
// $b = 7;
// $a *= $b;
// var_dump($a);

// $a = 15;
// $b = 3;
// $a /= $b;
// var_dump($a);

// $a = 20;
// $b = 7;
// $a %= $b;
// var_dump($a);

// Comparison Operators:

// $a = 5;
// $b = "5";
// $result = ($a == $b);
// var_dump($result);

// $a = 5;
// $b = "5";
// $result = ($a === $b);
// var_dump($result);

// $a = 10;
// $b = 7;
// $result = ($a != $b);
// var_dump($result);

// $a = 15;
// $b = 7;
// $result = ($a > $b);
// var_dump($result);

// $a = 5;
// $b = 9;
// $result = ($a < $b);
// var_dump($result);

// $a = 10;
// $b = 10;
// $result = ($a >= $b);
// var_dump($result);

// $a = 5;
// $b = 5;
// $result = ($a <= $b);
// var_dump($result);


// Logical Operators:


// $a = true;
// $b = false;
// $result = ($a && $b);
// var_dump($result);

// $a = true;
// $b = false;
// $result = ($a || $b);
// var_dump($result);

// $a = true;
// $result = !$a;
// var_dump($result);


// Increment and Decrement Operators:

// $a = 5;
// $b = 5;
// $a++;
// ++$b;
// var_dump($a);
// var_dump($b);
  
// $a = 10;
// $a--;
// var_dump($a);


// String Operators:

// $a = "Hello, ";
// $b = "PHP!";
// $result = $a . $b;
// var_dump($result);

// $a = "Hello, ";
// $b = "PHP!";
// $a .= $b;
// var_dump($a);

// Conditional (Ternary) Operator:

// $a = true;
// $b = "True Result";
// $c = "False Result";
// $result = ($a ? $b : $c);
// var_dump($result);


// Statements:


// $condition = true;

// if ($condition) {
//     echo "Condition is true.";
// }


// $condition = false;

// if ($condition) {
//     echo "Condition is true.";
// } else {
//     echo "Condition is false.";
// }

// $number = 10;
// if ($number > 0) {
//     echo "Number is positive.";
// } elseif ($number < 0) {
//     echo "Number is negative.";
// } else {
//     echo "Number is zero.";
// }

// $condition1 = true;
// $condition2 = false;

// if ($condition1) {
//     if ($condition2) {
//         echo "Both conditions are true.";
//     } else {
//         echo "Only the first condition is true.";
//     }
// } else {
//     echo "The first condition is false.";
// }

// $dayOfWeek = "Monday";


// switch ($dayOfWeek) {
//     case "Monday":
//         echo "It's the start of the week!";
//         break;

//     case "Tuesday":
//     case "Wednesday":
//     case "Thursday":
//         echo "It's a weekday.";
//         break;

//     case "Friday":
//         echo "TGIF! It's Friday!";
//         break;

//     case "Saturday":
//     case "Sunday":
//         echo "It's the weekend!";
//         break;

//     default:
//         echo "Invalid day of the week.";
// }


// Loops:

// for ($i = 1; $i <= 5; $i++) {
//     echo $i . " ";
// }

// $i = 1;
// while ($i <= 5) {
//     echo $i . " ";
//     $i++;
// }

// $colors = array("Red", "Green", "Blue");
// foreach ($colors as $color) {
//     echo $color . " ";
// }



// Array Functions:
// Array Creation and Initialization:


// $emptyArray = array();
// $shortArray = [];
// var_dump($emptyArray, $shortArray);

// $array1 = array("a", "b");
// $array2 = array("c", "d");
// $mergedArray = array_merge($array1, $array2);
// var_dump($mergedArray);

// $keys = array("a", "b", "c");
// $values = array(1, 2, 3);
// $combinedArray = array_combine($keys, $values);
// var_dump($combinedArray);

// $rangeArray = range(1, 10,2);
// print_r($rangeArray);   


// Array Modification:


// $stack = array("apple", "banana");
// array_push($stack, "orange");
// array_push($stack, " ");
// var_dump($stack);

// $stack = array("apple", "banana", "orange");
// $poppedElement = array_pop($stack);
// var_dump($poppedElement, $stack);

// $queue = array("orange", "banana");
// array_unshift($queue, "apple");
// var_dump($queue);

// $queue = array("apple", "banana", "orange");
// $shiftedElement = array_shift($queue);
// var_dump($shiftedElement, $queue);

// $originalArray = array("apple", "banana", "cherry", "date");
// $replacementArray = array("kiwi", "lemon");
// array_splice($originalArray, 2, 2, $replacementArray);
// var_dump($originalArray);


// Array Access:


// $countArray = array(1, 2, 3, 4, 5);
// $arrayCount = count($countArray);
// var_dump($arrayCount);

// $sizeArray = array("apple", "banana", "cherry");
// $arraySize = sizeof($sizeArray);
// var_dump($arraySize);

// $assocArray = array("a" => 1, "b" => 2, "c" => 3);
// $keyExists = array_key_exists("a", $assocArray);
// var_dump($keyExists);

// $keysArray = array("a" => 1, "b" => 2, "c" => 3);
// $arrayKeys = array_keys($keysArray);
// var_dump($arrayKeys);

// $valuesArray = array("a" => 1, "b" => 2, "c" => 3);
// $arrayValues = array_values($valuesArray);
// var_dump($arrayValues);


// Array Search:


// $searchArray = array("apple", "banana", "cherry");
// $result = in_array("banana", $searchArray);
// var_dump($result);

// $searchArray = array("apple", "banana", "cherry");
// $key = array_search("banana", $searchArray);
// var_dump($key);

// $reverseArray = array("apple", "banana", "cherry");
// $reversedArray = array_reverse($reverseArray);
// var_dump($reversedArray);


// Array Sorting:


// $unsortedArray = array(4, 2, 8, 1, 6," ");
// sort($unsortedArray);
// var_dump($unsortedArray);

// $unsortedArray = array(4, 2, 8, 1, 6);
// rsort($unsortedArray);
// var_dump($unsortedArray);

// $assocArray = array("b" => 2, "a" => 10, "c" => -3);
// asort($assocArray);
// var_dump($assocArray);

// $assocArray = array("b" => 2, "a" => 10, "c" => -3);
// ksort($assocArray);
// var_dump($assocArray);

// $assocArray = array("b" => 2, "a" => 10, "c" => -3);
// arsort($assocArray);
// var_dump($assocArray);

// $assocArray = array("b" => 2, "a" => 10, "c" => -3);
// krsort($assocArray);
// var_dump($assocArray);


// Array Filtering:


// $numbers = array(1, 2, 3, 4, 5);
// $filteredArray = array_filter($numbers, function ($value) {
//     return $value % 2 == 0;
// });
// var_dump($filteredArray);

// $numbers = [1, 2, 3, 4, 5];
// $square = function ($num) {
//     return $num * $num;
// };

// $squaredNumbers = array_map($square, $numbers);
// var_dump($squaredNumbers);

// $numbers = [1, 2, 3, 4, 5];
// $sumCallback = function ($carry, $item) {
//     $carry += $item;
//     return $carry;
// };

// $sum = array_reduce($numbers, $sumCallback, 0);
// var_dump($sum);



// Array Slicing


// $fruits = ["apple", "banana", "cherry", "date", "elderberry"];

// // Extracts a portion of the array starting from index 2 with length 3
// $resultSlice = array_slice($fruits, 2, 3, true);
// var_dump($resultSlice);

// $colors = ["red", "green", "blue", "yellow", "orange"];
// // Removes 2 elements starting from index 1 and replaces with new values
// $removed = array_splice($colors, 1, 2, ["purple", "pink"]);
// var_dump($colors);
// var_dump($removed);


?>