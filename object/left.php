<?php
$mas = array(
    array(1, 2, 1, 5, 8),
    array(2, 8, 6, 6, 9),

    array(9, 11, 8, 7, 7),
    array(9, 11, 8, 7, 7));
$l = 0;
$S = 0;
for ($u = count($mas); $u > ((count($mas) / 2)); $u--) {
    $Left[$l] = $mas[$u - 1][0];
    $S = $u;
    $l++;
}
for ($i = 0; $i < ((count($mas[$S - 1]) / 2)); $i++) {

    $Seredniy[$i] = $mas[$S - 1][$i];

}
echo $S;
print_r($Left);
echo '<br>';
print_r($Seredniy);