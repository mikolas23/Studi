<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.14
 * Time: 10:00
 */
$sum=array();
$str = "hello worl this is one page";
$arr3 = str_split($str,5);
function sort1 ($arr1)
{
    @$arr2[0] = $arr1[1];
    @$arr2[1] = $arr1[4];
    @$arr2[2] = $arr1[3];
    @$arr2[3] = $arr1[2];
    @$arr2[4] = $arr1[0];
    return  implode($arr2);
}
for($n=0;$n<count($arr3);$n++)
{
$m=1;
 $a = sort1($arr3[$n]);
if($n>$m)
{
    $m=$n;
}
  $sum[$n]=$a;
}

//if($arr1)
//{
//    @$arr2[0] = $arr1[1];
//    @$arr2[1] = $arr1[4];
//    @$arr2[2] = $arr1[3];
//    @$arr2[3] = $arr1[2];
//    @$arr2[4] = $arr1[0];
//

//    $s=count(implode($sum[$m]));
//$s=count($arr3[$m]);
//echo  $s;
echo implode($sum);
//print_r($sum[$m]);
?>