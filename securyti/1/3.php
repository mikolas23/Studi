<?php
$scr2="Hello world";
print_r($scr2);
echo "<br>";
$str = "Hello world";
$arr1 = str_split($str);
$n = -1;
$arr2=$arr1;
$arr2 = array();
while ($n <= count($arr1)) {
    @$arr2[$n] = $arr1[$n + 1];
    @$arr2[$n + 1] = $arr1[$n + 4];
    @$arr2[$n + 2] = $arr1[$n + 3];
    @$arr2[$n + 3] = $arr1[$n + 2];
    @$arr2[$n + 4] = $arr1[$n];
    $n =$n + 4;
}
$comma_separated = implode($arr2);
echo $comma_separated; // lastname, email, phone
?>
