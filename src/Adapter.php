<?php

abstract class Player
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function attack();

    abstract public function defense();
}

class Forward extends Player
{
    public function attack()
    {
        echo '前锋:', $this->name, '进攻', PHP_EOL;
    }

    public function defense()
    {
        echo '前锋:', $this->name, '防守', PHP_EOL;
    }
}

class Center extends Player
{
    public function attack()
    {
        echo '中锋:', $this->name, '进攻', PHP_EOL;
    }

    public function defense()
    {
        echo '中锋:', $this->name, '防守', PHP_EOL;
    }
}

class ForeignCenter
{
    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function 进攻()
    {
        echo '外籍中锋:', $this->name, '进攻', PHP_EOL;
    }

    public function 防守()
    {
        echo '外籍中锋:', $this->name, '防守', PHP_EOL;
    }
}

class Translator extends Player
{
    protected $foreignCenter;

    public function __construct(string $name)
    {
        $this->foreignCenter = new ForeignCenter();
        $this->foreignCenter->setName($name);
        parent::__construct($name);
    }

    public function attack()
    {
        $this->foreignCenter->进攻();
    }

    public function defense()
    {
        $this->foreignCenter->防守();
    }
}

$forwards = new Forward('巴蒂尔');
$forwards->attack();
$forwards->defense();

$translator = new Translator('姚明');
$translator->defense();
$translator->attack();