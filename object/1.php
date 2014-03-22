<?php

$mas = array(array(1, 1, 1, 1, 1), array(2, 8, 6, 7, 8), array(9, 9, 9, 9, 9), array(2, 7, 6, 7, 8));
$a = count($mas);
//echo $a;
//print_r($mas);

//foreach($mas as $key => $value)
//{
//    echo "<b> $value </b>";
//
//
//}
$maks = 0;
$minm = 100;
$sum = 0;
for ($x = 0; $x < $a; $x++) {
    for ($i = 0; $i < count($mas[$x]); $i++) {
        $sum += $mas[$x][$i];
    }
    if ($sum >= $maks) {
        $maks = $sum;
        $m_maks = $x;
    }
    if ($sum <= $minm) {
        $minm = $sum;
        $n_mins = $x;
    }
}

$mas2 = $mas[$m_maks];
$mas[$m_maks] = $mas[$n_mins];
$mas[$n_mins] = $mas2;


print_r($mas);

?>