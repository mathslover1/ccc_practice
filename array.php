<?php 
 $a = [-1,1,24,3,34,5];
 $min = $a[0];
    for($i=1;$i<count($a);$i++){
        if ($min>$a[$i]){
            $min = $a[$i];
        }
    }
 print_r($min);
?>