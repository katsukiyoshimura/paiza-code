<?php
    class AnimalFeetCalculator {
        private $totalFeet;
        private $numAnimals;
        private $feetPerCrane;
        private $feetPerTurtle;
    
        public function __construct($totalFeet, $numAnimals, $feetPerCrane, $feetPerTurtle) {
            $this->totalFeet = $totalFeet;
            $this->numAnimals = $numAnimals;
            $this->feetPerCrane = $feetPerCrane;
            $this->feetPerTurtle = $feetPerTurtle;
        }
    
        public function calculate() {
            $numCrane = [];
            for ($i = 1; $i < $this->numAnimals; $i++) {
                if ($this->feetPerCrane * $i + $this->feetPerTurtle * ($this->numAnimals - $i) == $this->totalFeet) {
                    $numCrane[] = $i;
                }
            }
    
            if (count($numCrane) == 1) {
                return [$numCrane[0], $this->numAnimals - $numCrane[0]];
            } else {
                return "miss";
            }
        }
    }

    [$feet_total, $num_animal, $feet_crane, $feet_turtle] = explode(" ", trim(fgets(STDIN)));
    $calculator = new AnimalFeetCalculator($feet_total, $num_animal, $feet_crane, $feet_turtle);
    $result = $calculator->calculate();
    
    if (is_array($result)) {
        echo $result[0]. " ". $result[1];
    } else {
        echo $result;
    }
    
?>