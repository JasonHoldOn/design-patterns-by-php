<?php

abstract class Mediator
{
    public abstract function send(string $message, Colleague $colleague);
}

abstract class Colleague
{
    protected $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    abstract function send(string $message);

    abstract function notify(string $message);
}

class ConcreteColleague1 extends Colleague
{
    public function send(string $message)
    {
        $this->mediator->send($message, $this);
    }

    public function notify(string $message)
    {
        echo __METHOD__, ' ', $message, PHP_EOL;
    }
}

class ConcreteColleague2 extends Colleague
{
    public function send(string $message)
    {
        $this->mediator->send($message, $this);
    }

    public function notify(string $message)
    {
        echo __METHOD__, ' ', $message, PHP_EOL;
    }
}

class ConcreteMediator extends Mediator
{
    private $colleagues = [];

    public function setColleague(Colleague $colleague): void
    {
        array_push($this->colleagues, $colleague);
    }

    public function send(string $message, Colleague $colleague)
    {
        foreach ($this->colleagues as $value) {
            if ($value === $colleague) {
                $colleague->notify($message);
            }
        }
    }
}

$mediator = new ConcreteMediator();
$c1 = new ConcreteColleague1($mediator);
$c2 = new ConcreteColleague2($mediator);
$mediator->setColleague($c1);
$mediator->setColleague($c2);
$c1->send('Hello');
$c2->send('Hi');