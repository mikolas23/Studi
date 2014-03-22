<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post">
    ведіть шифр: 5 символів<br/>
    <textarea rows="2" cols="10" name="text">heaaa</textarea><br/>
    <input type="submit" name="go" value="Шифрувати"/>
</form>

<?php


$list = "textdfdsfdsafdasfads";
$list_mas = str_split($list);
$count = count($list_mas);
$dec_mas = array('00000', '00001', '00010', '00011', '00100', '00101', '00110', '00111', '01000', '01001', '01010', '01011', '01100', '01101', '01110', '01111', '10000', '10001', '10010', '10011');
$A = 1;
$C = 3;
$b = 8; // formula modula
$T0 = 2;
$M = pow(2, $b);
$T1 = ($A * $T0 + $C) % $M;
$T2 = ($A * $T1 + $C) % $M;
$T3 = ($A * $T2 + $C) % $M;
$T4 = ($A * $T3 + $C) % $M;
$T5 = ($A * $T4 + $C) % $M;
$mac_random = array($T1, $T2, $T3, $T4, $T5);
for ($i = 0; $i <= $count - 1; $i++) {
    $mod_mas[$i] = $dec_mas[array_rand($mac_random)];
}
print_r($mod_mas);

//foreach ($bin_mas as $k => $v) {
//    echo '<br>';
//    echo "$k=>$v ";
//
?>