##Five agile principles that should guide you every time you write code.

####(Examples are written in PHP)

These principles, when combined together, make it easy for a programmer to develop software that are easy to maintain and extend. They also make it easy for developers to avoid code smells, easily refactor code, and are also a part of the agile or adaptive software development.

####Examples:

####**SRP	The Single Responsibility Principle**
A class should have one, and only one, reason to change.

Let's say that we have a Modem class encapsulating the concept of a modem and its functionalities.

````
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
````

We can foud here that this class has 2 responsabilties:
First is data chanel and second connection

Mixing business logic with presentation is bad because it is against the Single Responsibility Principle (SRP). Take a look at the following code:
````
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
````

Even this very basic example shows how separating presentation from business logic, and respecting SRP, gives great advantages in our design's flexibility.

####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/SingleResponsibility/uml/uml.png)

####**OCP	The Open Closed Principle**
You should be able to extend a classes behavior, without modifying it.

At first thought that might sound quite academic and abstract. What it means though is that we should strive to write code that doesn’t have to be changed every time the requirements change.


####UML diagram:
![alt tag](https://github.com/igariok1990/solid-principles-php/blob/master/OpenClose/uml/uml.png)

####**LSP	The Liskov Substitution Principle**
Derived classes must be substitutable for their base classes.

####**ISP	The Interface Segregation Principle**
Make fine grained interfaces that are client specific.

####**DIP	The Dependency Inversion Principle**
Depend on abstractions, not on concretions.

