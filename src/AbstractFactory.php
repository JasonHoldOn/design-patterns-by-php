<?php

interface  Shape
{
    public function draw();
}

abstract class Circle implements Shape
{
    abstract public function draw();
}

abstract class Triangle implements Shape
{
    abstract public function draw();
}

class RedCircle extends Circle
{
    public function draw()
    {
        echo '红色的圆形', PHP_EOL;
    }
}

class BlueCircle extends Circle
{
    public function draw()
    {
        echo '蓝色的圆形', PHP_EOL;
    }
}

class PinkCircle extends Circle
{
    public function draw()
    {
        echo '粉色的圆形', PHP_EOL;
    }
}

class RedTriangle extends Triangle
{
    public function draw()
    {
        echo '红色的三角形', PHP_EOL;
    }
}

class BlueTriangle extends Triangle
{
    public function draw()
    {
        echo '蓝色的三角形', PHP_EOL;
    }
}

class PinkTriangle extends Triangle
{
    public function draw()
    {
        echo '粉色的三角形', PHP_EOL;
    }
}

abstract class ShapeFactory
{
    abstract public function getCircle();

    abstract public function getTriangle();
}

class RedShapeFactory extends ShapeFactory
{
    public function getCircle()
    {
        return new RedCircle();
    }

    public function getTriangle()
    {
        return new RedTriangle();
    }
}

class BlueShapeFactory extends ShapeFactory
{
    public function getCircle()
    {
        return new BlueCircle();
    }

    public function getTriangle()
    {
        return new BlueTriangle();
    }
}

class PinkShapeFactory extends ShapeFactory
{
    public function getCircle()
    {
        return new PinkCircle();
    }

    public function getTriangle()
    {
        return new PinkTriangle();
    }
}

$redShapeFactory = new RedShapeFactory();
$redShapeFactory->getCircle()->draw();
$redShapeFactory->getTriangle()->draw();

$blueShapeFactory = new BlueShapeFactory();
$blueShapeFactory->getTriangle()->draw();
$blueShapeFactory->getCircle()->draw();

$pinkShapeFactory = new PinkShapeFactory();
$pinkShapeFactory->getCircle()->draw();
$pinkShapeFactory->getTriangle()->draw();