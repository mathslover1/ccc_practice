<?php

for ($i = 1; $i <= 6; $i++) {
    for ($j =1; $j < 6; $j++) {
        if ($i > $j) {
            echo "_"." ";
        } else {
    echo "$j"." ";
    }
  }
  for ($k = 6; $k <=12-$i; $k++) {
        echo "$k"." ";;
    }
    for ($k = 10; $k >11-$i;$k--){
        echo "_"." ";
    }
  echo "<br>";
}
for ($i = 5; $i >= 1; $i--) {
    for ($j =1; $j < 6; $j++) {
        if ($i > $j) {
            echo "_"." ";
        } else {
    echo "$j"." ";
    }
  }
  for ($k = 6; $k <=12-$i; $k++) {
        echo "$k"." ";;
    }
    for ($k =10; $k >11-$i;$k--){
        echo "_"." ";
    }
  echo "<br>";
}

?>