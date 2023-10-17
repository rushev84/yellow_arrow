<?php


class Human
{
    private Train $train;
    private Car $startCar;

    private int $timeForOneCar;

    private int $currentCarNum = 0;
    private int $carCounter = 0;

    /**
     * Human constructor.
     * @param Train $train
     * @param int $timeForOneCar
     */
    public function __construct(Train $train, int $timeForOneCar)
    {
        $this->train = $train;
        $this->startCar = $this->train->getCar($this->currentCarNum);

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
        $this->currentCarNum++;
        $currentCar = $this->train->getCar($this->currentCarNum);

        if ($currentCar->hasLight()) {
            $currentCar->turnOffLight();
            $this->goBack();
        } else {
            $this->stepForward();
        }
    }

    private function goBack(): void
    {
        $this->carCounter += $this->currentCarNum;
        $this->currentCarNum = 0;

        if ($this->startCar->hasLight()) {
            $this->stepForward();
        } else {
            App::end($this->carCounter);
        }
    }
}