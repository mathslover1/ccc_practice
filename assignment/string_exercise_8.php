<?php
$number = readline("Input a number to check number is prime or not:");

// method 1:

// if ($number<= 1) {
//     echo "This is not a prime number";
// } else {
//     $isPrime = true;
//     for ($i = 2; $i < $number; $i++) {
//         if ($number % $i == 0) {
//             $isPrime = false;
//             break;
//         }
//     }
//     if ($isPrime) {
//         echo "$number is a prime number";
//     } else {
//         echo "$number is not a prime number";
//     }
// }

// / method 2:
function Prime($number) {
    if ($number <= 1) {
        return false;
    }
    for ($i=2; $i<=$number;$i++) {
        if ($number%$i == 0) {
            return false;
        }
    }
    return true;
}
if (Prime($number)) {
    echo "{$number} is a prime number.";
} else {
    echo "{$number} is not a prime number.";
}
?>
