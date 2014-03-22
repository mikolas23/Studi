<?php
class MyClass
{
    public $mas = array();
    public $Min;
    public $Maks;

    function Suma($mas)
    {
        $this->$mas = $mas;
        $this->$Maks = 100;
        $this->$Min = 0;

        for ($x = 0; $x <= count($mas) - 1; $x++) {
            for ($i = 0; $i <= count($mas[$x]) - 1; $i++) {
                if ($mas[$x][$i] >= $Maks) {
                    $Maks = $mas[$x][$i];
                }
                if ($mas[$x][$i] <= $Min) {
                    $Min = $mas[$x][$i];
                }
            }
        }

        echo $Min;
        echo $Maks;
    }
}

$mas = array(array(1, 1, 1, 1, 1), array(2, 8, 6, 7, 8), array(9, 9, 9, 9, 9), array(2, 7, 6, 7, 8));
//print_r($mas);
$obj = new MyClass();
echo $obj->$Min;
echo $obj->Maks;
//echo  $obj->Suma($mas);

?>