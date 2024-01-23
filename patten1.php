<?php

for ($i = 1; $i <= 5; $i++) {
    for ($j =1; $j < 6; $j++) {
        if ($i > $j) {
            echo "-"." ";
        } else {
    echo "$j"." ";
    }
  }
  for ($k = 6; $k <=11-$i; $k++) {
        echo "$k"." ";;
    }
    for ($k = 10; $k >11-$i;$k--){
        echo "-"." ";
    }
  echo "<br>";
}
for ($i = 4; $i >= 1; $i--) {
    for ($j =1; $j < 6; $j++) {
        if ($i > $j) {
            echo "-"." ";
        } else {
    echo "$j"." ";
    }
  }
  for ($k = 6; $k <=11-$i; $k++) {
        echo "$k"." ";;
    }
    for ($k = 10; $k >11-$i;$k--){
        echo "-"." ";
    }
  echo "<br>";
}

?>