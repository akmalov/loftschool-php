<?php

namespace HomeWork5;

class TransmissionAuto
{
    use Transmission;
    public function setGearAutomatic(float $speed)
    {
        if ($speed < 0) {
            return false;
        }
        $this->gear = $speed <= 20 ? 1 : 2;
        echo $this, '<br>';
        return true;
    }
}
