<?php


abstract class Strategy
{
    abstract public function algorithmInterface();
}

class ConcreteStrategyA extends Strategy
{
    public function algorithmInterface()
    {
        echo 'A算法实现', PHP_EOL;
    }
}

class ConcreteStrategyB extends Strategy
{
    public function algorithmInterface()
    {
        echo 'B算法实现', PHP_EOL;
    }
}

class ConcreteStrategyC extends Strategy
{
    public function algorithmInterface()
    {
        echo 'C算法实现', PHP_EOL;
    }
}

class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function contextInterface()
    {
        $this->strategy->algorithmInterface();
    }
}

// 客户端实现
$context = new Context(new ConcreteStrategyA());
$context->contextInterface();

$context = new Context(new ConcreteStrategyB());
$context->contextInterface();

$context = new Context(new ConcreteStrategyC());
$context->contextInterface();


/**
 * Class ContextFactory
 * 策略模式与简单工厂模式相结合
 */
class ContextFactory
{
    private $strategy;

    public function __construct(string $strategyName)
    {
        switch ($strategyName) {
            case 'a':
                $this->strategy = new ConcreteStrategyA();
                break;
            case 'b':
                $this->strategy = new ConcreteStrategyB();
                break;
            case 'c':
                $this->strategy = new ConcreteStrategyC();
                break;
        }
    }

    public function contextInterface()
    {
        $this->strategy->algorithmInterface();
    }
}

// 客户端实现
$context = new ContextFactory('c');
$context->contextInterface();

$context = new ContextFactory('b');
$context->contextInterface();

$context = new ContextFactory('a');
$context->contextInterface();