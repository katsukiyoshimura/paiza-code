<?php
 
     class Table {   
        private $height;
        private $width;
        private $input;
        
        public function setAreaInfo() {
            [$this->height, $this->width] = explode(" ", trim(fgets(STDIN)));
        }
        
        public function setInitData() {
            $this->input = [];
            for ($line = 0; $line < 2; $line++) {
                $this->input[] = explode(" ", trim(fgets(STDIN)));
            }
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
        
        public function output() {
            for ($i = 0; $i < $this->height; $i++) {
                echo implode(" ", $this->input[$i])."\n";
            }
        }
    }
    
    $autoMadeTable = new Table();
    $autoMadeTable->setAreaInfo();
    $autoMadeTable->setInitData();
    $autoMadeTable->extendLine();
    $autoMadeTable->extendColumn();
    $autoMadeTable->output();
?>