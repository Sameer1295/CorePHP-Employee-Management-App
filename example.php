<?php

echo "Hello from cmd";
$a = 0;
$b = 1;

$n = readLine("Enter a number:");
$i = 0;
echo $a." ";
echo $b." ";
while($i<=$n-2){
    $c = $a +$b;
    echo $c." ";
    $a = $b;
    $b = $c;
    $i++;
}