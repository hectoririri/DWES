<?php
$a = 'hola';
$$a = "buenos dias";
echo "$hola <br>";
echo __DIR__;
echo __FILE__;
echo __LINE__;
$a=3;
$b="hola " . "5" + 3*$a; //Concatenar tiene un orden al igual que las operaciones
?>