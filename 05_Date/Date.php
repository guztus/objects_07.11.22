<?php declare(strict_types=1);

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->setMonth($month);
        $this->setDay($day);
        $this->year = $year;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
//        if ($month <= 12 && $month >= 1) {
//            $this->month = $month;
//        } else throw new LogicException ('Entered month is not in between 1 to 12 (including)!'); // what do I do if its not correct ?!?!
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
//        if ($day <= 31 && $day >= 1) {
//            $this->day = $day;
//        } // what do I do if its not correct ?!?!
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setYear(int $newYear)
    {
        $this->year = $newYear;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        return "{$this->month}/{$this->day}/{$this->year}" . PHP_EOL;
    }

}