<?php


class Carriage
{
    private int $length = 26;
    private bool $hasLight = false;

    public function getLength()
    {
        return $this->length;
    }

    public function setRandomLight()
    {
        $this->hasLight = (bool) rand(0, 1);
    }
}