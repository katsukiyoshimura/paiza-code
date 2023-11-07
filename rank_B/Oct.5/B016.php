<?php

    class Position {
        private $width;
        private $height;
        private $num;
        private $x;
        private $y;

        public function __construct($width, $height, $num, $x, $y) {
            $this->width = $width;
            $this->height = $height;
            $this->num = $num;
            $this->x = $x;
            $this->y = $y;
        }

        public function moveWithinBounds($position, $max, $delta) {
            $position += $delta;
            $position %= $max;
            if ($position < 0) {
                $position += $max;
            }
            return $position;
        }

        public function findLastPosition() {
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

            return $this->x . " " . $this->y;
        }
    }

    [$width, $height, $num] = explode(" ", trim(fgets(STDIN)));
    [$x, $y] = explode(" ", trim(fgets(STDIN)));

    $pos = new Position($width, $height, $num, $x, $y);
    echo $pos->findLastPosition();
?>
