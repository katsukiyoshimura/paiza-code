<?php
     class Table {   
        private $height;
        private $width;
        private $input;

        public function __construct($height, $width, $input) {
            $this->height = $height;
            $this->width = $width;
            $this->input = $input;
        }
            
        public function calculateAP($a, $b) {
            return $b * 2 - $a;
        }
    
        public function extendLine() {
            for ($line = 2; $line < $this->height; $line++) {
                for ($column = 0; $column < 2; $column++) {
                    $this->input[$line][$column] = $this->calculateAP($this->input[$line-2][$column], $this->input[$line-1][$column]);
                }
            }
        }
        
        public function extendColumn() {
            for ($line = 0; $line < $this->height; $line++) {
                for ($column = 2; $column < $this->width; $column++) {
                    $this->input[$line][$column] = $this->calculateAP($this->input[$line][$column-2], $this->input[$line][$column-1]);
                }
            }
        }
        
        public function arrange() {
            return $this->input;
        }
    }
    
    [$height, $width] = explode(" ", trim(fgets(STDIN)));

    $input = [];
    for ($line = 0; $line < 2; $line++) {
        $input[] = explode(" ", trim(fgets(STDIN)));
    }
    $autoMadeTable = new Table($height, $width, $input);
    $autoMadeTable->extendLine();
    $autoMadeTable->extendColumn();
    $extendedTable = $autoMadeTable->arrange();
    
    foreach ($extendedTable as $line) {
    echo implode(" ", $line)."\n";
}
?>