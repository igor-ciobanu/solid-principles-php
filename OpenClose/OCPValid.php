<?php

namespace OCPValid;

class GasStation
{

    public function putGasInVehicle(Vehicle $vehicle)
    {
       $vehicle->putGasIn();
    }

}

abstract class Vehicle
{
    protected $tank;

    public function setTank($tank)
    {
        $this->tank = $tank;
    }

    abstract public function putGasIn();
}

class Car extends Vehicle
{

    public function putGasIn()
    {
        $this->setTank(50);
    }
}

class Motorcycle extends Vehicle
{
    public function putGasIn()
    {
        $this->setTank(20);
    }
}