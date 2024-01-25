<?php
function generateFibonacci($numTerms) {
    $fibonacciSequence = array();
    if ($numTerms >= 1) {
        $fibonacciSequence[] = 0;
    }
    if ($numTerms >= 2) {
        $fibonacciSequence[] = 1;
    }

    for ($i = 2; $i < $numTerms; $i++) {
        $fibonacciSequence[] = $fibonacciSequence[$i - 1] + $fibonacciSequence[$i - 2];
    }

    return $fibonacciSequence;
}

$numTerms =readline("Limit of series is:");
$fibonacciSequence = generateFibonacci($numTerms);
echo "Fibonacci Sequence up to $numTerms terms: " . implode(', ', $fibonacciSequence);
?>
