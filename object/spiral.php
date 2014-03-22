<?php
class MyClass
{
    public $mas = array();
    public $Left = array();
    public $Top = array();
    public $Right = array();
    public $Up = array();
    public $Seredniy=array();
    public $Spiral=array();
    public $width;
    public $hight;
    public $S = 0;
    public $l = 0;
    public $p=0;
    public $r;


    function Suma($mas)
    {
        $this->mas = $mas;
        for ($x = 0; $x <= count($mas) - 1; $x++) {
            for ($i = 0; $i <= count($mas[$x]) - 1; $i++) {

                $this->Top[$i] = $mas[0][$i];

            }

        }

        for ($u = count($mas); $u > ((count($mas) / 2)); $u--) {


            $this->Left[$this->l] = $mas[$u - 1][0];
            $this->S = $u;
            $this->l++;
        }
        for ($i = 0; $i < ((count($mas[$this->S - 1]) / 2)); $i++) {

            $this->Seredniy[$i] = $mas[$this->S - 1][$i];

        }
        for ($b = count($mas[$u]) - 1; $b >= 0; $b--) {

            $this->Up[$this->p] = $mas[count($mas) - 1][$b];
            $this->p++;
        }

        for ($u=0; $u <=  count($mas) - 1; $u++) {
            $this->r=count($mas[$u]);
            $this->Right[$u] = $mas[$u][$this->r-1];

        }

//        unset
        $this->Top=implode($this->Top);
        $this->Top=implode($this->Top);
        $this->Left=implode($this->Left);
        $this->Up=implode($this->Up);
        $this->Right=implode($this->Right);
        $this->Seredniy=implode($this->Seredniy);
        $this->Spiral=array($this->Top,$this->Right,$this->Up,$this->Left,$this->Seredniy);
        $this->Spiral=implode($this->Spiral,'-');
        return $this->Spiral;

    }
}
?>

