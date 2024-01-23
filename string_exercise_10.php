<?php
$a=1;
function  factorial($num){
    global $a;
    for($i =$num; $i>0; $i--){
        $a*=$i;
}

return $a;
}
$num=readline("Enter the number:");
$number=factorial($num);
echo "Factorial of $num is: $number";
?>