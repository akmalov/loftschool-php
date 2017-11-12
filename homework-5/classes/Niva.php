<?php

namespace HomeWork5;

class Niva
{
    public $handBrake;
    public $gearBox;
    private $engine;
    public function __construct()
    {
        echo 'Автомобиля Нива <br>';
        $this->engine = new Engine(80, 20);
        $this->gearBox = new TransmissionManual();
        $this->handBrake = new ParkingBrake();
    }
    public function move(float $distance, float $speed, string $direction = 'forward')
    {
        if ($distance <= 0 || $speed <= 0) {
            return false;
        }
        $maxSpeed = $this->engine->getMaxSpeed();
        if ($maxSpeed < $speed) {
            return $this->move($distance, $maxSpeed, $direction);
        }
        $this->engine->powerEngineUp();
        $this->handBrake->setTheParkingBrakeOff();
        if ($direction = 'forward') {
            if ($speed <= 20) {
                $this->gearBox->setFirstGear();
            } else {
                $this->gearBox->setSecondGear();
            }
            echo "Движение вперед со скоростью ",
            "{$speed}м/с", '<br>';
        } else {
            if ($direction = 'backward') {
                $this->gearBox->setReverse();
                echo "Движение назад со скоростью ",
                "{$speed}м/с", '<br>';
            }
        }
        $distanceCovered = 0;
        while ($distance - $distanceCovered >= 10) {
            $distanceCovered += 10;
            echo "Проехали $distanceCovered метров. ";
            $this->engine->increaseTemperature(5);
        }
        if ($distanceCovered < $distance) {
            echo "Проехали $distance метров. ";
            $this->engine->increaseTemperature(
                5 * ($distance - $distanceCovered) / 10
            );
        }
        $this->gearBox->setNeutral();
        $this->engine->powerEngineOff();
        $this->handBrake->setTheParkingBrakeOn();
        return true;
    }
}
