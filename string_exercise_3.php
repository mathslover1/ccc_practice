<?php
echo  "<h3>Exercise 3</h3>";
$sentence = "The quick brown fox jumps over the lazy dog";
echo strpos($sentence,"fox");
echo "<br>";
echo strstr($sentence, "cat");
var_dump(strstr($sentence, "cat"));
echo "<br>";
echo substr($sentence,0,20);
echo "<br><br><br>";

?>