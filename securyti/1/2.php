<?php

$str = "hello   sdfdsfsdfdsf";
$arr2 = array();
$arr3 = array();
$arr4=array();
$arr1 = str_split($str,5);
for ($n = 0; $n < count($arr1); $n++) {
$i=0;
    $arr2[$n] = str_split($arr1[$n]);

        @$arr3[$n][$i] = $arr2[$n][$i + 1];
        @$arr3[$n][$i + 1] = $arr2[$n][$i + 4];
        @$arr3[$n][$i + 2] = $arr2[$n][$i + 3];
        @$arr3[$n][$i + 3] = $arr2[$n][$i + 2];
        @$arr3[$n][$i + 4] = $arr2[$n][$i];
        $arr4[$n]=implode($arr3[$n]);

}
print_r($arr3);
$comma = implode($arr4);
echo $comma;
//print_r($arr4);


//for ($n = 0; $n < count($arr1); $n++) {
//    $arr2[$n] = str_split($arr1[$a]);
//    if ($arr2[$n]) {
//        $arr2[$n][0] = $arr2[$n][0];
//
//        $arr2[$n][1] = $arr2[$n][0];
//
//        $arr2[$n][2] = $arr2[$n][0];
//
//        $arr2[$n][3] = $arr2[$n][0];
//        $arr2[$n][4] = $arr2[$n][0];
//        $arr2[$n][5] = $arr2[$n][0];
//    }
//    $sum+=$arr2[$n];
//    print("$arr1[$n]<BR>\n");
//$comma_separated = implode($arr3);
//echo $comma_separated;
//$comma_separated = implode($arr4);
//echo $comma_separated;

//print_r($arr4);
//print_r($arr2[$n]);

?>
<?php
//
//$string = "This is\tan example\nstring";
///* в качестве разделителей используем пробел, табуляцию и перевод строки */
//$tok = strtok($string, " \n\t");
//
//while ($tok) {
//    echo "Word=$tok<br />";
//    $tok = strtok(" \n\t");
//}
//
?>