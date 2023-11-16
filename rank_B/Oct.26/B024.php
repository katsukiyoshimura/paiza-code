<?php
class Area {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }
            
    public function calculatePaintedArea() {
        $innerPart = 0;
        for ($x = 1; $x <= ceil($this->radius); $x++) {
           for ($y = 1; $y <= ceil($this->radius); $y++) {
               if (($x - 1) ** 2 + ($y - 1) ** 2 <= $this->radius ** 2) {
                   $innerPart++;
               }
           }
        }
        $totalInnerPart = $innerPart * 4;
        return $totalInnerPart;
    }
}

$radius = fgets(STDIN);
$paintedArea = new Area($radius);
echo $paintedArea->calculatePaintedArea();
?>
