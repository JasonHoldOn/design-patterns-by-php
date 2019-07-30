<?php


abstract class Component
{
    abstract public function operation();
}

class ConcreteComponent extends Component
{
    public function operation()
    {
        echo '具体对象的操作', PHP_EOL;
    }
}

abstract class Decorator extends Component
{
    /**
     * @var Component
     */
    protected $component;

    public function setComponent(Component $component): void
    {
        $this->component = $component;
    }

    public function operation()
    {
        if ($this->component) {
            $this->component->operation();
        }
    }
}

class ConcreteDecoratorA extends Decorator
{
    // 本类的独有功能，以区别于ConcreteDecoratorB
    private $addedState;

    public function operation()
    {
        parent::operation();
        $this->addedState = "ConcreteDecoratorA Status";
        echo $this->addedState, PHP_EOL;
        echo '具体装饰对象A的操作', PHP_EOL;
    }
}

class ConcreteDecoratorB extends Decorator
{
    public function operation()
    {
        // 首先运行原Component的Operation(),再执行本类的功能，
        // 如addedBehavior,相当于对原Component进行了装饰
        parent::Operation();
        $this->addedBehavior();
        echo '具体装饰对象B的操作', PHP_EOL;
    }

    // 本类的独有功能，以区别于ConcreteDecoratorA
    private function addedBehavior()
    {
        echo 'ConcreteDecoratorB Status', PHP_EOL;
    }
}

$component = new ConcreteComponent();
$decorator1 = new ConcreteDecoratorA();
$decorator2 = new ConcreteDecoratorB();
$decorator1->setComponent($component);
$decorator2->setComponent($decorator1);
$decorator2->operation();

class Person
{
    protected $name;

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function show()
    {
        echo '的', $this->name, PHP_EOL;
    }
}

class Finery extends Person
{
    /**
     * @var Person
     */
    protected $component;

    public function decorate(Person $component)
    {
        $this->component = $component;
    }

    public function show()
    {
        if ($this->component) {
            $this->component->show();
        }
    }
}

class TShirts extends Finery
{
    public function show()
    {
        echo '大T恤 ';
        parent::show();
    }

}

class BigTrouser extends Finery
{
    public function show()
    {
        echo '小短裤 ';
        parent::show();
    }
}

class Tie extends Finery
{
    public function show()
    {
        echo '打领带 ';
        parent::show();
    }
}

class Suit extends Finery
{
    public function show()
    {
        echo '穿西服 ';
        parent::show();
    }
}

$person = new Person();
$person->setName('小菜');
$ts = new TShirts();
$bt = new BigTrouser();
$bt->decorate($person);
$ts->decorate($bt);
$ts->show();

$person2 = new Person();
$person2->setName('大菜');
$suit = new Suit();
$tie = new Tie();
$tie->decorate($person2);
$suit->decorate($tie);
$suit->show();
