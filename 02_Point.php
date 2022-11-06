<?php declare(strict_types=1);

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function set_value(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $point1, Point $point2)
    {
        $point2Copy = new Point ($point2->x, $point2->y); // to save the values before changing them

        $point2->set_value($point1->x, $point1->y);
        $this->set_value($point2Copy->x, $point2Copy->y);
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")\n";
echo "(" . $p2->x . ", " . $p2->y . ")\n";
