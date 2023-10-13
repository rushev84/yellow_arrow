<?php


class Human
{
    private Train $train;
    private int $timeForOneCar;

    public int $carNum = 0;
    public int $counter = 1;

    /**
     * Human constructor.
     * @param Train $train
     * @param int $timeForOneCar
     */
    public function __construct(Train $train, int $timeForOneCar)
    {
        $this->train = $train;
        $this->timeForOneCar = $timeForOneCar;
    }


    public function go()
    {
        $initCar = $this->train->getCar($this->carNum);
        $initCar->turnOnLight();
        print_r("------modified train---------" . "\n");
        var_dump($this->train);

        $this->stepForward();
    }

    public function stepForward()
    {
        print_r("step_forward" . "\n");
        $this->counter++;
        $this->carNum++;

        $currentCar = $this->train->getCar($this->carNum);
        if ($currentCar->hasLight()) {
            $this->stepBack();
        } else {
            $this->stepForward();
        }
    }

    public function stepBack()
    {
        print_r("step_back" . "\n");
        $this->counter++;
        $this->carNum--;
    }
}