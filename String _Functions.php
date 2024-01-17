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

// echo str_word_count($a);
// Returns the number of words in a string.

// echo substr_replace($a, "123", 0, 0);
// echo "<br>";
// echo substr_replace($a, "123", 1, 3);
// Replaces a portion of a string with another string.

// echo str_pad($a, 15, "*", STR_PAD_BOTH);
// echo "<br>";
// echo str_pad($a, 15, "*", STR_PAD_LEFT);
// echo "<br>";
// echo str_pad($a, 15, "*", STR_PAD_RIGHT);
// Pads a string to a certain length with another string

$string1 = "abc";
$string2 = "def";
$ab="200";
$ba="2";
// echo strcmp($string1, $string2);
// echo strcmp($ab, $ba);
// 0 - if the two strings are equal
// <0 - if string1 is less than string2
// >0 - if string1 is greater than string2

// echo strcoll($string1, $string2);
// echo "<br>";
// echo strcoll($ab, $ba);
// Locale based string comparison.'

// $mask = "123";
// $mask2="bd";
// echo strcspn($a, $mask,0,5);
// echo "<br>";
// echo strcspn($a, $mask2,3,5);

// echo stristr($a, "DEF");
// echo "<br>";
// echo stristr($a, "b");
// Case-insensitive search for the first occurrence of a string.

// echo strpbrk($a, "ba");
// Searches a string for any of a set of characters.

// echo strrev($a);
// Reverses a string


?>