<?php

namespace HomeWork5;

abstract class Car
{
    abstract public function move(float $distance, float $speed, string $direction = 'forward');
}
