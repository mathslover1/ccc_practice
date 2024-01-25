<?php
echo  "<h3>Exercise 4</h3>";
$name = "John";
echo str_pad($name,10,"_", STR_PAD_LEFT);
echo "<br>";
echo str_pad($name,8,"*", STR_PAD_RIGHT);
echo "<br><br><br>";
?>