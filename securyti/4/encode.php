<?php
function encode($e,$n,$msg){

    global $position; // An array that translates charaters and symbols to numbers.
    $encrypted = array();

    $msg =  preg_split("//",$msg, -1, PREG_SPLIT_NO_EMPTY);

    for ($i=0; $i<count($msg); $i++){
        $encrypted[] = fastexp($position[$msg[$i]],$e,$n);
    }
    return join('',$encrypted);
}
$msg="hello my brather";
$e=7;
$n=20;
echo encode($e,$n,$msg);