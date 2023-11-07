<?php
    class Number {
        private $height;
        private $width;
        private $digit;
        private $input;
        
        public function setInfo() {
            [$this->height, $this->width, $this->digit] = explode(" ", trim(fgets(STDIN)));
        }

        public function setData() {
            $this->input = [];
            for ($line = 0; $line < $this->height; $line++) {
                $this->input[] = str_split(trim(fgets(STDIN)));
            }
        }

        public function setNum($array0, $array1) {
            return $this->input[$array0][$array1];
        }
        
        public function setMaxNum(&$maxNum, $num) {  
            $maxNum = max($maxNum, intval($num));
        }
        
        public function outputMaxNum() {
            $maxNum = -1;
            for ($line = 0; $line < $this->height; $line++) {
                for ($column = 0; $column < $this->width; $column++) {
                    // 上から下
                    if ($line + $this->digit <= $this->height) {
                        $num = "";
                        for ($targetDigit = 0; $targetDigit < $this->digit; $targetDigit++) {
                            $num .= $this->setNum($line + $targetDigit, $column);
                        }
                        $this->setMaxNum($maxNum, $num);
                    }
                    // 左から右
                    if ($column + $this->digit <= $this->width) {
                        $num = "";
                        for ($targetDigit = 0; $targetDigit < $this->digit; $targetDigit++) {
                            $num .= $this->setNum($line, $column + $targetDigit);
                        }
                        $this->setMaxNum($maxNum, $num);
                    }
                }
            }
            echo $maxNum;
        }
    }
    
    $num = new Number();
    $num->setInfo();
    $num->setData();
    $num->outputMaxNum();
   
?>
