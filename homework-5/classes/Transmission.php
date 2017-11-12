<?php

namespace HomeWork5;

trait Transmission
{
    private $gear = 0;
    public function __toString()
    {
        switch ($this->gear) {
            case -1:
                return 'Задняя передача';
                break;
            case 0:
                return 'Нейтральная передача';
                break;
            case 1:
                return 'Первая передача';
                break;
            case 2:
                return 'Вторая передача';
                break;
            default:
                return 'Ошибка';
        }
    }
    public function getGear()
    {
        return $this->gear;
    }
    public function setNeutral()
    {
        $this->gear = 0;
        echo $this, '<br>';
    }
    public function setReverse()
    {
        $this->gear = -1;
        echo $this, '<br>';
    }
}
