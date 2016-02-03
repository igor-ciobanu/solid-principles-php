<?php

namespace SRPValid;

interface DataChannel
{
    /**
     * @param $c
     * @return mixed
     */
    public function send($c);

    /**
     * @return string
     */
    public function receive();

}

interface Connection
{
    /**
     * @param $pno
     * @return mixed
     */
    public function dial($pno);

    public function hangup();
}

class ModemImplementation implements DataChannel, Connection
{

    /**
     * @param $c
     * @return mixed
     */
    public function send($c)
    {
        // Implementing send() method.
    }

    /**
     * @return string
     */
    public function receive()
    {
        // Implementing receive() method.
    }

    /**
     * @param $pno
     * @return mixed
     */
    public function dial($pno)
    {
        // Implementing dial() method.
    }

    public function hangup()
    {
        // Implementing hangup() method.
    }
}