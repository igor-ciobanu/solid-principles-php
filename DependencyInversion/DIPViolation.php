<?php

namespace DIPViolation;

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

$manager = new Manager();

//will not work
$manager->setWorker(new SuperWorker());
$manager->manage();

//will work
$manager->setWorker(new Worker());
$manager->manage();