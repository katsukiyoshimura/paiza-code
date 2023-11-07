<?php
    class Area {
        private $radius;
        private $innerPart;

        public function __construct($radius) {
            $this->radius = $radius;
        }
                
        public function calculatePaintedArea() {
            $this->innerPart = 0;
            for ($x = 1; $x <= ceil($this->radius); $x++) {
               for ($y = 1; $y <= ceil($this->radius); $y++) {
                   if (($x - 1) ** 2 + ($y - 1) ** 2 <= $this->radius ** 2) {
                       $this->innerPart++;
                   }
               }
            }
        }
        
        function calculateTotalPaintedArea() {
            return $this->innerPart * 4;
        }
    }
    
    $radius = fgets(STDIN);
    $paintedArea = new Area($radius);
    $paintedArea->calculatePaintedArea();
    echo $paintedArea->getTotalPaintedArea();
?>