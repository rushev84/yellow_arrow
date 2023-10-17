<?php


class Train
{
    private array $cars;

    /**
     * Train constructor.
     * @param int $equatorLength
     * @param int $carLength
     */
    public function __construct(int $carsNumber)
    {
        for ($i = 0; $i < $carsNumber; $i++) {
            $car = new Car();
            $car->setRandomLight();
            $this->cars[] = $car;
        }
    }

    public function getCar(int $number): Car
    {
        if (isset($this->cars[$number])) {
            return $this->cars[$number];
        }
        return $this->cars[0];
    }
}