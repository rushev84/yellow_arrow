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
        $carsNumber = floor($equatorLength / $carLength); // test - 38

        for ($i = 0; $i < $carsNumber; $i++) {
            $car = new Car();
            $car->setRandomLight();
            $this->cars[] = $car;
        }
    }

    public function getCar(int $number): Car
    {
        return $this->cars[$number];
    }
}