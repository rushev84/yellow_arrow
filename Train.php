<?php


class Train
{
    private array $carriages;

    /**
     * Train constructor.
     */
    public function __construct(int $lengthOfEquator)
    {
        $lengthOfCarriage = 26;
        $numberOfCarriages = floor($lengthOfEquator / $lengthOfCarriage); // test - 38

        for ($i = 0; $i < $numberOfCarriages; $i++) {
            $carriage = new Carriage();
            $carriage->setRandomLight();
            $this->carriages[] = $carriage;
        }
    }
}