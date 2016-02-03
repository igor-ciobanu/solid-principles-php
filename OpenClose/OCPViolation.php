<?php

namespace OCPViolation;

class GasStation
{

    public function putGasInVehicle(Vehicle $vehicle)
    {
        if ($vehicle->getType() == 1)
            $this->putGasInCar($vehicle);
        elseif ($vehicle->getType() == 2)
            $this->putGasInMotorcycle($vehicle);
    }

    public function putGasInCar(Car $car)
    {
        $car->setTank(50);
    }

    public function putGasInMotorcycle(Motorcycle $motorcycle)
    {
        $motorcycle->setTank(20);
    }

}

class Vehicle
{
    protected $type;
    protected $tank;

    public function getType()
    {
        return $this->type;
    }

    public function setTank($tank)
    {
        $this->tank = $tank;
    }
}

class Car extends Vehicle
{
    protected $type = 1;
}

class Motorcycle extends Vehicle
{
    protected $type = 2;
}