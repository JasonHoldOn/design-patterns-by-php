<?php

/**
 * Class Operation
 * 学会通过分封装，继承，多态把程序的藕合度降低
 * 复用，不是复制！
 * 高内聚，低耦合
 */
class Operation
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

class AddOperation extends Operation
{
    public function getResult()
    {
        return $this->a + $this->b;
    }
}

class SubOperation extends Operation
{
    public function getResult()
    {
        return $this->a - $this->b;
    }
}

class MulOperation extends Operation
{
    public function getResult()
    {
        return $this->a * $this->b;
    }
}

class DivOperation extends Operation
{
    public function getResult()
    {
        return $this->a / $this->b;
    }
}

class OperationFactory
{
    public static function createOperation(string $operation)
    {
        switch ($operation) {
            case '+':
                $operator = new AddOperation();
                break;
            case '-':
                $operator = new SubOperation();
                break;
            case '*':
                $operator = new MulOperation();
                break;
            case '/':
                $operator = new DivOperation();
                break;
            default:
                $operator = new Operation();
        }

        return $operator;
    }
}

$operator = OperationFactory::createOperation('+');
$operator->setA(5);
$operator->setB(5);
echo $operator->getResult(), PHP_EOL;


$operator = OperationFactory::createOperation('-');
$operator->setA(5);
$operator->setB(5);
echo $operator->getResult(), PHP_EOL;

$operator = OperationFactory::createOperation('*');
$operator->setA(5);
$operator->setB(5);
echo $operator->getResult(), PHP_EOL;

$operator = OperationFactory::createOperation('/');
$operator->setA(5);
$operator->setB(5);
echo $operator->getResult(), PHP_EOL;