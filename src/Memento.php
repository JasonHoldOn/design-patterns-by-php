<?php

namespace Memento;

// 发起人类
class Originator
{
    private $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state): void
    {
        $this->state = $state;
    }

    public function createMemento()
    {
        return new Memento($this->getState());
    }

    public function restoreMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }

}

class Memento
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function setState($state): void
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}

class CareTaker
{
    /** @var Memento */
    private $memento;

    public function getMemento()
    {
        return $this->memento;
    }

    public function setMemento(Memento $memento): void
    {
        $this->memento = $memento;
    }
}

$originator = new Originator();
$careTaker = new CareTaker();
$originator->setState('On');
echo '初始状态：', $originator->getState(), PHP_EOL;
$careTaker->setMemento($originator->createMemento());
$originator->setState('Off');
echo '新的状态：', $originator->getState(), PHP_EOL;
$originator->restoreMemento($careTaker->getMemento());
echo '恢复状态：', $originator->getState(), PHP_EOL;

class Girl
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

}

class You
{
    private $wifeName;

    public function getWifeName()
    {
        return $this->wifeName;
    }

    public function setWifeName($wifeName): void
    {
        $this->wifeName = $wifeName;
    }

    public function createMemento()
    {
        return new Girl($this->getWifeName());
    }

    public function restoreMemento(Girl $girl)
    {
        $this->setWifeName($girl->getName());
    }
}

class GirlStack
{
    private $girls = [];
    private $index = -1;

    public function push(Girl $girl)
    {
        if (count($this->girls) >= 4) {
            echo '不可以，有4个美女了', PHP_EOL;
        } else {
            $this->girls[++$this->index] = $girl;
        }
    }

    public function pop()
    {
        if ($this->index < 0) {
            echo '不可以，还没有美女呢', PHP_EOL, die;
        } else {
            return $this->girls[$this->index--];
        }
    }
}

$you = new You();
$girlStack = new GirlStack();
$you->setWifeName('西施');
echo '当前美女是：', $you->getWifeName(), PHP_EOL;
$girlStack->push($you->createMemento());
$you->setWifeName('王昭君');
$girlStack->push($you->createMemento());
$you->setWifeName('杨玉环');
echo '修改后的美女是：', $you->getWifeName(), PHP_EOL;
$you->restoreMemento($girlStack->pop());
echo '恢复后的美女是：', $you->getWifeName(), PHP_EOL;
$you->restoreMemento($girlStack->pop());
echo '恢复后的美女是：', $you->getWifeName(), PHP_EOL;
