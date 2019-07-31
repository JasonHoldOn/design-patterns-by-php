<?php


abstract class PersonBuilder
{
    abstract public function buildHead();

    abstract public function buildBody();

    abstract public function buildArmLeft();

    abstract public function buildArmRight();

    abstract public function buildLegLeft();

    abstract public function buildLegRight();
}

class ThinPersonBuilder extends PersonBuilder
{
    public function buildHead()
    {
        echo '小头', PHP_EOL;
    }

    public function buildBody()
    {
        echo '小身子', PHP_EOL;
    }

    public function buildArmLeft()
    {
        echo '左臂', PHP_EOL;
    }

    public function buildArmRight()
    {
        echo '右臂', PHP_EOL;
    }

    public function buildLegLeft()
    {
        echo '左腿', PHP_EOL;
    }

    public function buildLegRight()
    {
        echo '右腿', PHP_EOL;
    }
}

class FatPersonBuilder extends PersonBuilder
{
    public function buildHead()
    {
        echo '大头', PHP_EOL;
    }

    public function buildBody()
    {
        echo '大身子', PHP_EOL;
    }

    public function buildArmLeft()
    {
        echo '左臂', PHP_EOL;
    }

    public function buildArmRight()
    {
        echo '右臂', PHP_EOL;
    }

    public function buildLegLeft()
    {
        echo '左腿', PHP_EOL;
    }

    public function buildLegRight()
    {
        echo '右腿', PHP_EOL;
    }
}

class PersonDirector
{
    protected $personBuilder;

    public function __construct(PersonBuilder $builder)
    {
        $this->personBuilder = $builder;
    }

    public function createPerson()
    {
        $this->personBuilder->buildHead();
        $this->personBuilder->buildBody();
        $this->personBuilder->buildArmLeft();
        $this->personBuilder->buildArmRight();
        $this->personBuilder->buildLegLeft();
        $this->personBuilder->buildLegRight();
    }
}

echo '瘦的人:', PHP_EOL;
$thinDirector = new PersonDirector(new ThinPersonBuilder());
$thinDirector->createPerson();

echo '胖的人:', PHP_EOL;
$fatDirector = new PersonDirector(new FatPersonBuilder());
$fatDirector->createPerson();
