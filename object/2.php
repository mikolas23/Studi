<?php
include ("spiral.php");

$mas = array(
    array(1, 2, 1, 5, 8),
    array(2, 8, 6, 6, 9),
    array(9, 11, 8, 7, 7),
    array(9, 11, 8, 7, 7));

//print_r($mas);
$obj = new MyClass();
echo $obj->Suma($mas);
?>