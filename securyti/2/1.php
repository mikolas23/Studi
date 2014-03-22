<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post">
    ведіть дану фразу<br/>
    <input type="text" rows="2" cols="10" name="text"><br/>
    <input type="submit" name="go" value="Шифрувати"/>
</form>
<?php
class shifrClass
{
    public function shifr_znachena()
    {
        $list = $_POST['text'];
        $list_mas = str_split($list);
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
        for ($n = 0; $n < count($list_mas); $n++) {

            for ($i = 0; $i < count($mas); $i++) {
                if ($list_mas[$n] == $mas[$i]) {
                    $bin_mas[$n] = $dec_mas[$i];

                }
            }
        }
        return implode($bin_mas); //verta masiv simvoliv perevedeviy y binarniy file
    } //zakodovuyem vhidne znachena
    public function module()
    {
        if (isset($_POST['go'])) {
            $list = $_POST['text'];
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
            return implode($mod_mas);
        }

    }

}
class moduleClass extends shifrClass
{

    public function suma_binar($Sifr, $module)
    {
        $Suma_Binary = array(); //masim yakiy poznachaye sumu chisel
        $Sifr_S = str_split($Sifr);
        $Shifr_M = str_split($module);
        echo "перетворені символи у бінарний код";
        echo "<br>";
        echo $Sifr;
        echo "<br>";
        echo "перетворені плевдо випадкові числа";
        echo "<br>";
        echo $module;
        echo "<br>";
        for ($i = count($Shifr_M) - 1; $i >= 0; $i--) {

            if ($Shifr_M[$i] == 0 and  $Sifr_S[$i] == 0) {
                $Suma_Binary[$i] = 0;
            } elseif ($Shifr_M[$i] == 1 and  $Sifr_S[$i] == 1) {
                $Suma_Binary[$i] = 0;
            } else {
                $Suma_Binary[$i] = 1;
            }

        }
        ksort($Suma_Binary);
        echo "після додавання";
        echo "<br>";
        echo implode($Suma_Binary);
    }
}

$obj = new moduleClass;
$Sifr_simvoliv = $obj->shifr_znachena();
$Shifr_modu = $obj->module();
$obj->suma_binar($Sifr_simvoliv, $Shifr_modu);
?>