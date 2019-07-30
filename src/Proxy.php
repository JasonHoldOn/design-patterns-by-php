<?php

abstract class Subject
{
    abstract public function request();
}

class RealSubject extends Subject
{
    public function request()
    {
        echo '真实的请求', PHP_EOL;
    }

}

class Proxy extends Subject
{
    /** @var Subject */
    protected $realSubject;

    public function request()
    {
        if (!$this->realSubject) {
            $this->realSubject = new RealSubject();
        }

        return $this->realSubject->request();
    }

}

$proxy = new Proxy();
$proxy->request();


class Girl
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

abstract class GiveGift
{
    abstract public function giveDolls();

    abstract public function giveFlowers();

    abstract public function giveChocolate();
}

class Boy extends GiveGift
{
    /** @var Girl */
    protected $girl;

    public function __construct(Girl $girl)
    {
        $this->girl = $girl;
    }

    public function giveDolls()
    {
        echo $this->girl->getName(), '，这是送你的娃娃', PHP_EOL;
    }

    public function giveFlowers()
    {
        echo $this->girl->getName(), '，这是送你的花', PHP_EOL;
    }

    public function giveChocolate()
    {
        echo $this->girl->getName(), '，这是送你的克力', PHP_EOL;
    }
}

class GiveGiftProxy extends GiveGift
{
    /** @var Boy */
    protected $boy;

    public function __construct(Girl $girl)
    {
        $this->boy = new Boy($girl);
    }

    public function giveDolls()
    {
        $this->boy->giveDolls();
    }

    public function giveFlowers()
    {
        $this->boy->giveFlowers();
    }

    public function giveChocolate()
    {
        $this->boy->giveChocolate();
    }

}

$proxy = new GiveGiftProxy(new Girl('李兰'));
$proxy->giveDolls();
$proxy->giveChocolate();
$proxy->giveFlowers();