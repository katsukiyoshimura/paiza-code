<?php
    class Area {
        private $radius;
        
        function setRadius() {
            $this->radius = fgets(STDIN);
        }
        
        function calculatePaintedArea() {
            $this->innerPart = 0;
            for ($x = 1; $x <= ceil($this->radius); $x++) {
               for ($y = 1; $y <= ceil($this->radius); $y++) {
                   if (($x - 1) ** 2 + ($y - 1) ** 2 <= $this->radius ** 2) {
                       $this->innerPart++;
                   }
               }
            }
        }
        
        function outputTotalPaintedArea() {
            echo $this->innerPart * 4;
        }
    }
    
    $paintedArea = new Area();
    $paintedArea->setRadius();
    $paintedArea->calculatePaintedArea();
    $paintedArea->outputTotalPaintedArea();
?>