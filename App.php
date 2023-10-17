<?php

class App
{
    private Train $train;
    private Human $human;

    private static int $timeForOneCar;

    public function __construct(int $carsNumber, int $timeForOneCar)
    {
        $this->train = new Train($carsNumber);
        $this->human = new Human($this->train, $timeForOneCar);
        self::$timeForOneCar = $timeForOneCar;
    }

    public function start(): void
    {
        $this->human->go();
    }

    public static function end(int $carCounter): void
    {
        print_r("Обход закончен!" . "\n");
        print_r("Количество пройденных вагонов: {$carCounter}" . "\n");
        $duration = ($carCounter * self::$timeForOneCar) / 60 / 60 / 24 / 365;
        print_r("Потраченное время (лет): {$duration}" . "\n");
    }
}