<?php


class Human
{
    private Train $train;
    private int $timeForOneCar;

    private int $carNum = 0;
    private int $counter = 0;

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
        // Получаем начальный вагон (в котором находится человек)
        $initCar = $this->train->getCar($this->carNum);
        // Включаем в этом вагоне свет
        $initCar->turnOnLight();

        print_r("------modified train---------" . "\n");
        var_dump($this->train);

        // Переходим в следующий вагон
        $this->stepForward();
    }

    private function stepForward()
    {
        print_r("step_forward" . "\n");

        // Увеличиваем на 1 количество пройденных вагонов
        $this->counter++;
        // Получаем тот вагон, в который только что зашли (т.е. следующий вагон)
        $this->carNum++;
        $currentCar = $this->train->getCar($this->carNum);

        print_r("counter: {$this->counter}" . "\n");

        // Если свет в вагоне горит, выключаем в нём свет и возвращаемся в изначальный вагон
        if ($currentCar->hasLight()) {
            $currentCar->turnOffLight();
            $this->goBack();
        // Если не горит, переходим в следующий вагон
        } else {
            $this->stepForward();
        }


    }

    private function goBack()
    {
        print_r("GO_BACK" . "\n");

        // Увеличиваем количество пройденных вагонов на номер того вагона, с которого мы начали путь домой
        $this->counter += $this->carNum;
        // Мы в изначальном вагоне
        $this->carNum = 0;

        // Получаем изначальный вагон
        $initCar = $this->train->getCar($this->carNum);
        // Если свет в изначальном вагоне горит, значит, надо снова в путь.
        if ($initCar->hasLight()) {
            $this->stepForward();
        // Если не горит, то ВСЁ - мы прошли круг
        } else {


            print_r("FINISH" . "\n");
            print_r("counter: {$this->counter}" . "\n");
            print_r("carNum: {$this->carNum}" . "\n");
        }


    }
}