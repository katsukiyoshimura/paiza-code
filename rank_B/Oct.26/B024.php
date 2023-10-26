<?php
class Area {
    private $radius;
    
    public function __construct() {
        $this->setRadius();
        $this->output();
    }
    
    function setRadius() {
        $this->radius = fgets(STDIN);
    }
    
    function output() {
    $innerPart = 0;
    for ($x = 1; $x <= ceil($this->radius); $x++) {
       for ($y = 1; $y <= ceil($this->radius); $y++) {
           if (($x - 1) ** 2 + ($y - 1) ** 2 <= $this->radius ** 2) {
               $innerPart++;
           }
       }
    }
    echo $innerPart * 4;
    }
}

new Area();
?>