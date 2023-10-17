<?php


class Car
{
    private bool $hasLight = false;

    public function setRandomLight(): void
    {
        $this->hasLight = (bool) rand(0, 1);
    }

    public function turnOnLight(): void
    {
        $this->hasLight = true;
    }

    public function turnOffLight(): void
    {
        $this->hasLight = false;
    }

    public function hasLight(): bool
    {
        return $this->hasLight;
    }
}