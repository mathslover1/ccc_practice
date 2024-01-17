<?php
$a = "abcdefghi";
$b = "ABCDEFGHI";
$c = "   abcdefghi   ";
$d = "Hello <br> World";
// echo strlen($a);
// Returns the length of a string.

// echo str_replace("abc", "123", $a);
// Replaces all occurrences of a substring with another substring in a given string.

// echo strpos($a,"bcd");
// Finds the position of the first occurrence of a substring in a string.

// echo substr($a, 1, 4);
// Returns a part of a string starting from the specified position and with a specified length.

// echo strtolower($b);
// Converts a string to lowercase

// echo strtoupper($a);
// Converts a string to uppercase.

// echo trim($c);
// Removes whitespace or other predefined characters from the beginning and end of a string.

// $array = str_split($a);
// $array2 = str_split($b);
// echo implode("-", $array);
// echo "<br>";
// echo implode("-", $array2);
// echo "<br>";
// echo implode("+", $array);
// Joins array elements with a string.

// $array = explode("bcd", $a);
// print_r($array);
// Splits a string into an array by a specified delimiter.

// echo htmlspecialchars($d);
// Converts special characters to HTML entities.

// echo htmlentities($d);
// Converts all applicable characters to HTML entities

// echo str_repeat($a,4);
// Repeats a string a specified number of times.'

// echo strrev($a);
// Reverses a string.

// echo str_shuffle($a);
// Randomly shuffles all characters in a string.

// print_r(str_split($a, 4));
// print_r(str_split($a));
// Converts a string to an array, breaking it into smaller chunks.

echo str_word_count($a);
?>