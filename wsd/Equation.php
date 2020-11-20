<?php
class Equation {

//function to be exposed must be public
public function solve($a,$b,$c) {
    $delta = $b*$b-4*$a*$c;
    if ($delta <0){
        return array();
    }
    if ($delta == 0){
        $x = $b*$b / (-2*$a);
        return array($x);
    }
    if ($delta > 0) {
        $x1 = (-$b-sqrt($delta))/(2*$a);
        $x2 = (-$b+sqrt($delta))/(2*$a);
        return array ($x1, $x2);
    }
}

}
?>