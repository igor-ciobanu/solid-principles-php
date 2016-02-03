<?php

namespace ISPViolation;


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