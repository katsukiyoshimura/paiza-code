<?php

class Position {
    private $width;
    private $height;
    private $num;
    private $x;
    private $y;

    public function __construct() {
        $this->setInfo();
        $this->outputPosition();
    }

    private function setInfo() {
        [$this->width, $this->height, $this->num] = explode(" ", trim(fgets(STDIN)));
        [$this->x, $this->y] = explode(" ", trim(fgets(STDIN)));
    }

    private function moveWithinBounds($position, $max, $delta) {
        $position += $delta;
        $position %= $max;
        if ($position < 0) {
            $position += $max;
        }
        return $position;
    }

    private function outputPosition() {
        for ($i = 0; $i < $this->num; $i++) {
            $move = trim(fgets(STDIN));
            [$direct, $distance] = explode(" ", $move);

            switch ($direct) {
                case "U":
                    $this->y = $this->moveWithinBounds($this->y, $this->height, $distance);
                    break;
                case "D":
                    $this->y = $this->moveWithinBounds($this->y, $this->height, -$distance);
                    break;
                case "R":
                    $this->x = $this->moveWithinBounds($this->x, $this->width, $distance);
                    break;
                case "L":
                    $this->x = $this->moveWithinBounds($this->x, $this->width, -$distance);
                    break;
            }
        }

        echo $this->x . " " . $this->y;
    }
}

new Position();

?>
