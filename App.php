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
        print_r("Считаем..." . "\n");
        $this->human->go();
    }

    public static function end(int $carCounter): void
    {
        $duration = $carCounter * self::$timeForOneCar;
        $postfix = "";

        if ($duration < 60) {
            $postfix = "сек.";
        } elseif ($duration >= 60 && $duration < 3600) {
            $duration = $duration / 60;
            $postfix = "мин.";
        } elseif ($duration >= 3600 && $duration < 86400) {
            $duration = $duration / 60 / 60;
            $postfix = "час.";
        } elseif ($duration >= 86400 && $duration < 31536000) {
            $duration = $duration / 60 / 60 / 24;
            $postfix = "дн.";
        } else {
            $duration = $duration / 60 / 60 / 24 / 365;
            $postfix = "лет";
        }

        $duration = ceil($duration);

        print_r("Обход закончен!" . "\n");
        print_r("Количество пройденных вагонов: {$carCounter}" . "\n");
        print_r("Потраченное время ($postfix): $duration" . "\n");
    }
}