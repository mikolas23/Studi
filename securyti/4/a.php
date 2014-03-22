<?php
function extend ($Ee,$Em) {
    $u1 = '1';
    $u2 = '0';
    $u3 = $Em;
    $v1 = '0';
    $v2 = '1';
    $v3 = $Ee;

    while (bccomp($v3, 0) != 0) {
        $qq = bcdiv($u3, $v3, 0);
        $t1 = bcsub($u1, bcmul($qq, $v1));
        $t2 = bcsub($u2, bcmul($qq, $v2));
        $t3 = bcsub($u3, bcmul($qq, $v3));
        $u1 = $v1;
        $u2 = $v2;
        $u3 = $v3;
        $v1 = $t1;
        $v2 = $t2;
        $v3 = $t3;
        $z  = '1';
    }

    $uu = $u1;
    $vv = $u2;

    if (bccomp($vv, 0) == -1) {
        $inverse = bcadd($vv, $Em);
    } else {
        $inverse = $vv;
    }

    return $inverse;
}

$M1=5;
$P=3;
$Q=11;
$E=($P-1)*($Q-1);
//$e=rand(1,$E);
$e=7;
$G=3;
$N=$P*$Q;// Modul
//$A = pow(3, $E-1);
//$d=pow($G,$e) * abs($E);
$d = extend($e,$E);
echo $d ;
echo '<br>';
echo $e;
echo '<br>';
$N=33;
$C1 = pow($M1,$e)%$N;
//echo $C1;
echo '<br>';
$M1 =pow($C1,$d)%$N;
echo $M1;
//$T2 = ($A * $T1 + $C) % $M;
//$T3 = ($A * $T2 + $C) % $M;


$e=pow($d,$E-1)%20;
//$m=pow(2,3);
//echo $m;
//echo $C1;

