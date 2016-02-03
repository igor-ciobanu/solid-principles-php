<?php

namespace LSPViolation;

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

class TestLS
{
    /**
     * @return Rectangle
     */
    private static function getNewRectangle()
    {
        return new Square();
    }

    /**
     * main test
     */
    public static function test()
    {
        $rectangle = self::getNewRectangle();
        $rectangle->setHeight(5);
        $rectangle->setWidth(10);
        // user knows that $rectangle it's a rectangle.
        // It assumes that he's able to set the width and height as for the base class


        echo $rectangle->getArea();
        // now he is surprised to see that the area is 100 instead of 50.
    }
}

TestLS::test();