<?php
//include("rsa.php");
//$RSA = new RSA();
$message="Helooo  fdsfagfdsagfagddsfsf";
$p=11;
$q=3;
function generate_keys ($p, $q, $show_debug=0){
    $n = bcmul($p, $q);

    //m (we need it to calculate D and E)
    $m = bcmul(bcsub($p, 1), bcsub($q, 1));

    // Public key  E
    $e = 10;

    // Private key D
    $d = extend($e,$m);

    $keys = array ($n, $e, $d);

    if ($show_debug) {
        echo "P (первое большое простое число) = $p
                Q (второе большое простое число)= $q
                N = $n - модуль
                M (промежуточное вспомогательное значение дял рассчёта D и Е) = $m
                E = $e - открытая экспонента
                D = $d - секретная экспонента<p>";
    }

    return $keys;
}
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
$keys = generate_keys ($p, $q);

function encrypt ($m, $e, $n, $s=3) {
$coded   = '';
    $max     = strlen($m);
    $packets = ceil($max/$s);

    for($i=0; $i<$packets; $i++){
        $packet = substr($m, $i*$s, $s);
        $code   = '0';

        for($j=0; $j<$s; $j++){
            $code = bcadd($code, bcmul(ord($packet[$j]), bcpow('256',$j)));
        }

        /* возводим число $code в степень $e и получаем остаток от деление на $n*/
        $code   = bcpowmod($code, $e, $n);
        $coded .= $code.' ';
    }

    //return trim($coded);
    return trim($coded);
}

 function decrypt ($c, $d, $n) {

     $coded   = spli(' ', $c);
     $message = '';
     $max     = 1;//count($coded);

     for($i=0; $i<$max; $i++){
         $code = bcpowmod($coded[$i], $d, $n);

         while(bccomp($code, '0') != 0){
             $ascii    = bcmod($code, '256');
             $code     = bcdiv($code, '256', 0);
             $message .= chr($ascii);
         }
     }

     return $message;
 }
function sign($message, $d, $n){
    $messageDigest = md5($message);
    $signature = encrypt($messageDigest, $d, $n, 3);
    return $signature;
}
 $encoded = encrypt ($message, $keys[1], $keys[0], 5);
//$decoded = decrypt ($encoded, $keys[2], $keys[0]);
//echo  $signature = sign($message, $keys[1], $keys[0]);
//echo "Success: ".(($RSA->prove($fake_msg, $signature, $keys[2], $keys[0])) ? "True" : "False")."\n";
print_r($keys);
?>