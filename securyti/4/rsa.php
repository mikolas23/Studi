<?
class RSA{
    public function generate_keys ($p, $q, $show_debug=0){
        $n = bcmul($p, $q);

        //m (we need it to calculate D and E)
        $m = bcmul(bcsub($p, 1), bcsub($q, 1));

        // Public key  E
        $e = $this->findE($m);

        // Private key D
        $d = $this->extend($e,$m);

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
    /*
    * Standard method of calculating D
    * D = E-1 (mod N)
    * It's presumed D will be found in less then 16 iterations
    */
    private function extend ($Ee,$Em) {
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

    /*
    * Функция возвращающая наибольший общий делитель для чисел $e и $m
    */
    private function GCD($e,$m) {
        $y = $e;
        $x = $m;

        while (bccomp($y, 0) != 0) {
            // modulus function
            $w = bcsub($x, bcmul($y, bcdiv($x, $y, 0)));;
            $x = $y;
            $y = $w;
        }

        return $x;
    }


    /* ФУНКЦИЯ ШИФРОВАНИЯ */
    public function encrypt2 ($m, $e, $n, $s=3) {
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

    // упрощённая функция шифрования (без разбиения на блоки)
    // можно использовать только для коротких слов
    public function encrypt ($str, $e, $n, $s=3)
    {

        $m = string_to_int($str);
        echo 'численное представление строки = '.$m.'';
        $code   = bcpowmod($m, $e, $n);
        echo 'полученная шифровка = '.$code.'';

        return $code;
    }

    // упрощённая функция расшифровки (без разбиения на блоки)
    // можно использовать только для коротких слов
    public function decrypt ($c, $d, $n) {

        $code = bcpowmod($c, $d, $n);
        echo 'расшифровано = ' . $code.'';

        return int_to_string($code);
    }

    /* ФУНКЦИЯ РАСШИФРОВКИ */
    /*
    ENCRYPT function returns
    M = X^D (mod N)
    */
    public function decrypt2 ($c, $d, $n) {

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

    // Digital Signature
    public function sign($message, $d, $n){
        $messageDigest = md5($message);
        $signature = $this->encrypt($messageDigest, $d, $n, 3);
        return $signature;
    }

    public function prove($message, $signature, $e, $n){
        $messageDigest = $this->decrypt($signature, $e, $n);
        if($messageDigest == md5($message)){
            return true;
        }else{
            return false;
        }
    }

    public function signFile($file, $d, $n){
        $messageDigest = md5_file($file);
        $signature = $this->encrypt($messageDigest, $d, $n, 3);
        return $signature;
    }

    public function proveFile($file, $signature, $e, $n){
        $messageDigest = $this->decrypt($signature, $e, $n);
        if($messageDigest == md5_file($file)){
            return true;
        }else{
            return false;
        }
    }
}
?>
