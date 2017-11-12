<?php

namespace HomeWork5;

class TransmissionManual
{
    use Transmission;
    public function setFirstGear()
    {
        $this->gear = 1;
        echo $this, '<br>';
    }
    public function setSecondGear()
    {
        $this->gear = 2;
        echo $this, '<br>';
    }
}
