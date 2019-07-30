<?php

class Operation2
{
    protected $a = 0;
    protected $b = 0;

    public function setA(int $a): void
    {
        $this->a = $a;
    }

    public function setB(int $b): void
    {
        $this->b = $b;
    }

    public function getResult()
    {
        return 0;
    }
}

class AddOperation2 extends Operation2
{
    public function getResult()
    {
        return $this->a + $this->b;
    }
}

class SubOperation2 extends Operation2
{
    public function getResult()
    {
        return $this->a - $this->b;
    }
}

class MulOperation2 extends Operation2
{
    public function getResult()
    {
        return $this->a * $this->b;
    }
}

class DivOperation2 extends Operation2
{
    public function getResult()
    {
        return $this->a / $this->b;
    }
}

interface IFactory
{
    public function createOperation(): Operation2;
}

class AddFactory implements IFactory
{
    public function createOperation(): Operation2
    {
        return new AddOperation2();
    }
}

class SubFactory implements IFactory
{
    public function createOperation(): Operation2
    {
        return new SubOperation2();
    }
}

class MulFactory implements IFactory
{
    public function createOperation(): Operation2
    {
        return new MulOperation2();
    }
}

class DivFactory implements IFactory
{
    public function createOperation(): Operation2
    {
        return new DivOperation2();
    }
}

$factory = new AddFactory();
$operation = $factory->createOperation();
$operation->setA(5);
$operation->setB(5);
echo $operation->getResult(), PHP_EOL;

$factory = new SubFactory();
$operation = $factory->createOperation();
$operation->setA(5);
$operation->setB(5);
echo $operation->getResult(), PHP_EOL;

$factory = new MulFactory();
$operation = $factory->createOperation();
$operation->setA(5);
$operation->setB(5);
echo $operation->getResult(), PHP_EOL;

$factory = new DivFactory();
$operation = $factory->createOperation();
$operation->setA(5);
$operation->setB(5);
echo $operation->getResult(), PHP_EOL;
