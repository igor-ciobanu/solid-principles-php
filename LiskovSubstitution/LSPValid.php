<?php
/**
 * Created by PhpStorm.
 * User: igorciobanu
 * Date: 2/3/16
 * Time: 6:51 PM
 */

namespace LSPValid;

class Vehicle
{
    public function startEngine()
    {
        // default engine start procedure
    }

    public function accelerate()
    {
        //default acceleration procedure
    }
}

class Car extends Vehicle
{
    public function startEngine()
    {
        $this->checkTank();
        parent::startEngine();
    }

    private function checkTank()
    {
        //check gas procedure
    }
}

class ElectricCar extends Vehicle
{
    public function accelerate()
    {
        $this->increaseVoltage();
    }

    private function increaseVoltage()
    {
        // increase voltage procedure
    }
}

class Driver
{
    function go(Vehicle $vehicle) {
        $vehicle->startEngine();
        $vehicle->accelerate();
    }
}

$driver = new Driver();
$driver->go(new ElectricCar());