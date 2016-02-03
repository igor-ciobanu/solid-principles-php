<?php

namespace DIPValid;

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

$manager = new Manager();

//will work
$manager->setWorker(new SuperWorker());
$manager->manage();

//will work
$manager->setWorker(new Worker());
$manager->manage();