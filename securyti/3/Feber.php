<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post">
    ведіть символи<br />
    <input type="text" rows="2" cols="10" name="text"><br />
    <input type="submit" name="go" value="Шифрувати" />
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 05.03.14
 * Time: 14:36
 */

class Feber {
 public  function shifr_znachena()
    {
        $list =  $_POST['text'];
        $list_mas = str_split($list);
       $leng=count($list_mas);
//        $a=array_rand();
$mas = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','.',',','!',':');
        for ($n = 0; $n < count($list_mas); $n++) {

            for ($i = 0; $i < count($mas); $i++)
            {
                if ($list_mas[$n] == $mas[$i]) {
                    $bin_mas[$n] = $i;
                }
            }
        }
     $b=0;
     for($n=0;$n<count($bin_mas)/2;$n++)
     {
             $mas_return[$n]=array($bin_mas[$b],$bin_mas[$b+1]);

         $b=$b+2;
     }
        return $mas_return; //verta masiv simvoliv perevedeviy y binarniy file
    }
public  function  feyerber($mas)
{

    for($i=1;$i<24;$i++)
{
$a1=$mas[0];
$a2=$mas[1]^(($mas[0]*$i)%9);
$mas[0]=$a2;
$mas[1]=$a1;
if($i==23)
{
 $a1=$mas[0];
$mas[0]=$mas[1];
$mas[1]=$a1;
}
}

//return implode($mas);a

return $mas;
}
 public function znachena_shifr($mas){
        $b=0;
        for($n=0;$n<count($mas);$n++)
        {
            if($mas[$n][0]){
                $mas5[$b]=$mas[$n][0];
            }
            if($mas[$n][1]){
                $mas5[$b+1]=$mas[$n][1];
            }
            $b=$b+2;
        }
        $masivchik = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','.',',','!',':');
        for ($n = 0; $n < count($mas5); $n++) {

            $masiv2[$n]=$masivchik[$mas5[$n]];
        }
        return implode($masiv2);
    }
}
$object=new Feber();// створюєм клас
$masiv2= $object->shifr_znachena();// отримуєм масив де кожин ключ має по 2 символи
for ($n = 0; $n < count($masiv2); $n++) {
    $feyera[$n]=$object->feyerber($masiv2[$n]); // викликаємо функцію і передаємо 2 елемента
}
$list=$object->znachena_shifr($feyera);
$l =  $_POST['text'];
echo 'даний текст';
echo '<br>';
echo $l;
echo '<hr>';
echo "закодований текст";
echo '<br>';
print_r($list);
echo '<br>';