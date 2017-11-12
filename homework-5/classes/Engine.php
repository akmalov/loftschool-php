<?php

namespace HomeWork5;

class Engine
{
    private $power;
    private $temperature;
    private $maxSpeed;
    public function __construct(float $power, float $temperature)
    {
        $this->power = $power;
        $this->temperature = $temperature;
        $this->maxSpeed = $power * 2;
        echo 'Двигатель мощностью ', $this->power, ' л.с., ',
        'температура двигателя ', $this->temperature, '°, максимальная скорость  - ',
        $this->maxSpeed, ' м/с<br>';
    }
    public function getPower()
    {
        return $this->power;
    }
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }
    public function powerEngineUp()
    {
        echo 'Включение двигателя <br>';
    }
    public function powerEngineOff()
    {
        echo 'Выключение двигателя <br>';
    }
    public function increaseTemperature(float $rise)
    {
        $this->temperature += $rise;
        echo 'температура двигателя ', $this->temperature, '° <br>';
        while ($this->temperature >= 90) {
            $this->temperature -= 10;
            echo 'Включение охлаждения, температура двигателя ', $this->temperature, '° <br>';
        }
    }
}
