<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post">
    Исходный текст:<br />
<textarea rows="10" cols="40" name="text">гидродинамический удар по данным астрономических наблюдений растягивает плазменный луч генерируя периодические импульсы синхротронного излучения при погружении в жидкий кислород расслоение стабилизирует субсветовой погранслой тем самым открывая возможность цепочки квантовых превращений тело несмотря на некоторую вероятность коллапса мономолекулярно усиливает фронт при этом дефект массы не образуется</textarea><br />
<input type="submit" name="go" value="Шифровать!" />
</form>
<?php
if(isset($_POST['go'])){
    $text = $_POST['text'];
 $a = 1;
    $text = strtolower($text);
    for($i=0;$i<strlen($text);$i++){
        if(!isset($alphabet[$text[$i]])){
            $alphabet[$text[$i]] = 0;
            $a++;
        }
    }

    $alphabet = array_keys($alphabet);
    sort ($alphabet);

    $alphabet = array_flip($alphabet);

//1)Установление начального состояния генератора псевдослучайных чисел
    $key .= $rand = rand(1,9);
//2)Установление начального списка подстановки
    $replace = array('A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $replace = array_rand(array_flip($replace), count($alphabet));
    $i=0;
    while(1){

//3)Все символы открытого текста зашифрованы?
        if($i>=strlen($text)){
//4) если да - конец работы, если нет -продолжить
            break;
        }

//5)осуществление замены
        $cryptogram .= $replace[ $alphabet[$text[$i]] ];
//6)генерация случайного числа
        $rand = rand(1,9);
        $key .= $rand;
//7)перестановка местами знаков в списке замены
        if ($rand > count($alphabet)) $rand -= count($alphabet);
        $s = array_search($rand-1, $alphabet);
        $tmp = $alphabet[$text[$i]];
        $alphabet[$text[$i]] = $alphabet[ $s ];
        $alphabet[ $s ] = $tmp;
//8) переход на шаг 4
        $i++;
    }
    echo "<br /><br />Зашифрованный текст:<br />".$cryptogram." (".strlen($cryptogram).")";
    echo "<br /><br />Ключ:<br />".$key;

    $strlen = strlen($text);
    echo "<br />($strlen)";
    $letters3 = array();
    $letters2 = array();

    for($i=0; $i<$strlen; $i++){
        // считаем статистику для зашифрованного 1го и 2го
        if(isset($letters2[$cryptogram[$i]])){
            $letters2[$cryptogram[$i]]++;
        }else{
            $letters2[$cryptogram[$i]]=1;
        }

        if(isset($letters3[$text[$i]])){
            $letters3[$text[$i]]++;
        }else{
            $letters3[$text[$i]]=1;
        }
    }


    // сортируем
    ksort($letters2);
    $keys2 = array_keys($letters2);
    ksort($letters3);
    $keys3 = array_keys($letters3);
    echo '<table><tr><td>';

    echo '<b>Исходный:</b><br /><table>';
    echo '<tr><td>Символ</td><td>Частота</td><td>Проценты</td></tr>';
    for($i=0; $i<count($letters3); $i++){
        $procent = $letters3[$keys3[$i]]*100/$strlen;
        $procent = substr($procent, 0, 4);
        echo '<tr><td>'.$keys3[$i].'</td><td>'.$letters3[$keys3[$i]].'</td><td><img src="dot.gif" border="0" width="'.($procent*10).'" height="10">'.$procent.'%</td></tr>';
    }
    echo '</table>';

    echo '</td><td>';

    echo '<b>Зашифрованный:</b><br /><table>';
    echo '<tr><td>Символ</td><td>Частота</td><td>Проценты</td></tr>';
    for($i=0; $i<count($letters2); $i++){
        $procent = $letters2[$keys2[$i]]*100/$strlen;
        $procent = substr($procent, 0, 4);
        echo '<tr><td>'.$keys2[$i].'</td><td>'.$letters2[$keys2[$i]].'</td><td><img src="dot.gif" border="0" width="'.($procent*10).'" height="10">'.$procent.'%</td></tr>';
    }
    echo '</table>';
    echo '</td></tr></table>';
    echo '<b>Всего символов в тексте: '.$strlen.'</b><br />';

}

?>
</body>
</html>