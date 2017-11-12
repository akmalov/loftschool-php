<?php

require 'classes/Car.php';
require 'classes/Engine.php';
require 'classes/Niva.php';
require 'classes/ParkingBrake.php';
require 'classes/Transmission.php';
require 'classes/TransmissionManual.php';
require 'classes/TransmissionAuto.php';
use HomeWork5\Niva as Niva;

$car = new Niva();
$car->move(500, 30, 'forward');
