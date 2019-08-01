<?php

namespace Observer;

abstract class Observer
{
    abstract public function update();
}

abstract class Subject
{
    private $observers = [];

    public function attach(Observer $observer)
    {
        array_push($this->observers, $observer);
    }

    public function detatch($observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($observer === $value) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class ConcreteSubject extends Subject
{
    protected $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state): void
    {
        $this->state = $state;
        $this->notify();
    }
}

class ConcreteObserver extends Observer
{
    protected $subject;
    protected $observerName;

    public function __construct(Subject $subject, string $observerName)
    {
        $this->subject = $subject;
        $this->observerName = $observerName;
    }

    public function update()
    {
        echo '观察者', $this->observerName, '发现状态被变更为', $this->subject->getState(), PHP_EOL;
    }

}

$subject = new ConcreteSubject();
$observer = new ConcreteObserver($subject, '001');
$subject->attach($observer);
$subject->setState(1);
$subject->setState(2);

echo PHP_EOL, '添加新的观察者,删除旧的观察者:', PHP_EOL;
$subject->attach(new ConcreteObserver($subject, '002'));
$subject->attach(new ConcreteObserver($subject, '003'));
$subject->detatch($observer);
$subject->setState(3);
$subject->setState(4);
