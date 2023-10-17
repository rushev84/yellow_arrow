<?php


class Train
{
    public array $cars;

    /**
     * Train constructor.
     * @param int $equatorLength
     * @param int $carLength
     */
    public function __construct(int $equatorLength, int $carLength)
    {
        // Общее числов вагонов
        $carsNumber = floor($equatorLength / $carLength);

        // В каждом вагоне делаем свет либо горящим, либо нет
        for ($i = 0; $i < $carsNumber; $i++) {
            $car = new Car();
            $car->setRandomLight();
            $this->cars[] = $car;
        }
    }

    public function getCar(int $number): Car
    {
        // Если запрашиваемый вагон существует, то возвращаем его
        if (isset($this->cars[$number])) {
            return $this->cars[$number];
        }
        // Если не существует (а это значит, что мы вышли за последний вагон), то возвращаем первый вагон
        return $this->cars[0];
    }
}