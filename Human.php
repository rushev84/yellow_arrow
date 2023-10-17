<?php


class Human
{
    private Train $train;
    private Car $startCar;

    private int $timeForOneCar;

    private int $carNum = 0;
    private int $carCounter = 0;

    /**
     * Human constructor.
     * @param Train $train
     * @param int $timeForOneCar
     */
    public function __construct(Train $train, int $timeForOneCar)
    {
        $this->train = $train;
        $this->startCar = $this->train->getCar($this->carNum);

        $this->timeForOneCar = $timeForOneCar;
    }

    public function go(): void
    {
        $this->startCar->turnOnLight();
        $this->stepForward();
    }

    private function stepForward(): void
    {
        $this->carCounter++;
        $this->carNum++;
        $currentCar = $this->train->getCar($this->carNum);

        if ($currentCar->hasLight()) {
            $currentCar->turnOffLight();
            $this->goBack();
        } else {
            $this->stepForward();
        }
    }

    private function goBack(): void
    {
        $this->carCounter += $this->carNum;
        $this->carNum = 0;

        if ($this->startCar->hasLight()) {
            $this->stepForward();
        } else {
            print_r("FINISH" . "\n");
            print_r("Кол-во пройденных вагонов: {$this->carCounter}" . "\n");
            $duration = ($this->carCounter * $this->timeForOneCar) / 60 / 60 / 24 / 365;
            print_r("Потраченное время (лет): {$duration}" . "\n");
        }
    }
}