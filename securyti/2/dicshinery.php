<?php
$mas = array('a', 'b', 'c
', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ', '.', ',', '!', ':');
foreach ($mas as $k => $v) {

    $n = decbin($k);
    $B = strlen($n);
    if ($B < 5) {
        $Dodan = 5 - $B;
        if ($Dodan == 2) {
            $n = "00" . $n;
        }
        if ($Dodan == 4) {
            $n = "0000" . $n;
        }
        if ($Dodan == 3) {
            $n = "000" . $n;
        }
        if ($Dodan == 1) {
            $n = "0" . $n;
        }
        $dec_mas[$k] = $n;
    } else {
        $dec_mas[$k] = $n;
    }
}
//створюєм бінарний масив даніх
print_r($dec_mas);
echo '<br>';
