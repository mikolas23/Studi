<?php
class MyClass
{

    public $Min;
    public $Maks;

    public function Suma($mas)
    {
//        $this->$mas=$mas;
        $this->Maks = $mas[0][0];
        $this->Min = $mas[0][0];

        for ($x = 0; $x <= count($mas) - 1; $x++) {
            for ($i = 0; $i <= count($mas[$x]) - 1; $i++) {
                if ($mas[$x][$i] >= $this->Maks) {
                    $this->Maks = $mas[$x][$i];
                }
                if ($mas[$x][$i] <= $this->Min) {
                    $this->Min = $mas[$x][$i];
                }
            }
        }

//        echo  $Min;
//        echo  $Maks;

//        return $Min;

        return array($this->Maks, $this->Min);
    }
}

$mas = array(array(2, 8, 6), array(9, 9, 9), array(2, 7, 6));
//print_r($mas);
$obj = new MyClass;
//echo  $obj->$Min;
//echo  $obj->Maks;
print_r($obj->Suma($mas));
