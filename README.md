##Five agile principles that should guide you every time you write code.

####(Examples are written in PHP)

These principles, when combined together, make it easy for a programmer to develop software that are easy to maintain and extend. They also make it easy for developers to avoid code smells, easily refactor code, and are also a part of the agile or adaptive software development.

####Examples:

####**SRP	The Single Responsibility Principle**
A class should have one, and only one, reason to change.

Let's say that we have a Modem class encapsulating the concept of a modem and its functionalities.

```php
class Modem
{
    public function dial($pno)
    {
        // Implementing dial($pno) method.
    }

    public function hangup()
    {
        //  Implementing hangup() method.
    }

    public function send($c)
    {
        // Implementing send($c) method.
    }

    public function receive()
    {
        // Implementing receive() method.
    }
}
```

We can find here that this class has 2 responsabilities:
First is data chanel and second connection

Mixing business logic with presentation is bad because it is against the Single Responsibility Principle (SRP). Take a look at the following code:
```php
interface DataChannel
{

    public function send($c);

    public function receive();

}

interface Connection
{

    public function dial($pno);

    public function hangup();
}

class ModemImplementation implements DataChannel, Connection
{

    public function send($c)
    {
        // Implementing send() method.
    }

    public function receive()
    {
        // Implementing receive() method.
    }

    public function dial($pno)
    {
        // Implementing dial() method.
    }

    public function hangup()
    {
        // Implementing hangup() method.
    }
}
```

Even this, very basic example shows how separating presentation from business logic, and respecting SRP, gives great advantages in our design's flexibility.


####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/SingleResponsibility/uml/uml.png)

####**OCP	The Open Closed Principle**
You should be able to extend a classes behavior, without modifying it.

At first thought that might sound quite academic and abstract. What it means though is that we should strive to write code that doesn’t have to be changed every time the requirements change.

Here is an example of GasStation the modality to put gas in vehicles, the code works but the problem will apear if we would like to put gas for another vehicle, for that we should update "putGasInVehicle()" method, that violate OPC

```php
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
```

After a little refactoring we got that:

```php
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
```


####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/OpenClose/uml/uml.png)

####**LSP	The Liskov Substitution Principle**
Derived classes must be substitutable for their base classes.

Below is the classic example for which the Likov Substitution Principle is violated. Let's assume that the Rectangle object is used somewhere in the application. We extend the application and add the Square class. The square class is returned by a factory pattern, based on some conditions and we don't know the exact what type of object will be returned.

```php
class Rectangle
{
    /** @var  integer */
    protected $width;
    /** @var  integer */
    protected $height;
    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->height * $this->width;
    }
}
class Square extends Rectangle
{
    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }
    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
        $this->width = $height;
    }
}
```
Valid example
```php
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
```
In conclusion this principle is just an extension of the Open Close Principle and it means that we must make sure that new derived classes are extending the base classes without changing their behavior.

####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/LiskovSubstitution/uml/uml.png)

####**ISP	The Interface Segregation Principle**
Make fine grained interfaces that are client specific.

Violated example
```php
interface IWorker
{
    public function work();
    public function eat();
}
class Worker implements IWorker
{
    public function work()
    {
        // working
    }
    public function eat()
    {
        // eating in launch break
    }
}
class Robot implements IWorker
{
    public function work()
    {
        // working 24 hours per day
    }
    public function eat()
    {
        // doesn't need this method
    }
}
```
Valid example:
```php
interface IWorkable
{
    public function work();
}
interface IFeedable
{
    public function eat();
}
class Worker implements IWorkable, IFeedable
{
    public function work()
    {
        // ....working
    }
    public function eat()
    {
        //.... eating in launch break
    }
}
class Robot implements IWorkable
{
    public function work()
    {
        // ....working
    }
}
class SuperWorker implements IWorkable, IFeedable
{
    public function work()
    {
        //.... working much more
    }
	public function eat()
    {
        //.... eating in launch break
    }
}
```

####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/InterfaceSegregation/uml/uml.png)

####**DIP	The Dependency Inversion Principle**
Depend on abstractions, not on concretions.

Violated example
```php
class Worker
{
    public function work()
    {
        // ....working
    }
}
class SuperWorker
{
    public function work()
    {
        //.... working much more
    }
}
class Manager
{
    /** @var Worker */
    private $worker;
    /**
     * @param Worker $worker
     */
    public function setWorker(Worker $worker)
    {
        $this->worker = $worker;
    }
    public function manage()
    {
        $this->worker->work();
    }
}
```
Valid example:
```php
interface IWorker
{
    public function work();
}
class Worker implements IWorker
{
    public function work()
    {
        // ....working
    }
}
class SuperWorker  implements IWorker
{
    public function work()
    {
        //.... working much more
    }
}
class Manager
{
    /** @var IWorker */
    private $worker;
    /**
     * @param IWorker $worker
     */
    public function setWorker(IWorker $worker)
    {
        $this->worker = $worker;
    }
    public function manage()
    {
        $this->worker->work();
	}
}
```

####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/DependencyInversion/uml/uml.png)
