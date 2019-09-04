<?php

namespace Visitor;

abstract class Action
{
    public abstract function getManConclusion(Man $man);

    public abstract function getWomanConclusion(Woman $man);
}

class Success extends Action
{
    public function getManConclusion(Man $concreteElementA)
    {
        echo '男人成功时，背后多半有一个伟大的女人', PHP_EOL;
    }

    public function getWomanConclusion(Woman $concreteElementB)
    {
        echo '女人成功时，背后多有一个不成功的男人', PHP_EOL;
    }
}

class Failing extends Action
{
    public function getManConclusion(Man $concreteElementA)
    {
        echo '男人失败时，闷头喝酒，谁也不用劝', PHP_EOL;
    }

    public function getWomanConclusion(Woman $concreteElementB)
    {
        echo '女人失败时，眼泪汪汪，谁也劝不了', PHP_EOL;
    }
}

class Amativeness extends Action
{
    public function getManConclusion(Man $concreteElementA)
    {
        echo '男人恋爱时，凡事不懂也要装懂', PHP_EOL;
    }

    public function getWomanConclusion(Woman $concreteElementB)
    {
        echo '女人恋爱时，遇事懂也装作不懂', PHP_EOL;
    }
}

abstract class Person
{
    public abstract function accept(Action $action);
}

class Man extends Person
{
    public function accept(Action $action)
    {
        $action->getManConclusion($this);
    }
}

class Woman extends Person
{
    public function accept(Action $action)
    {
        $action->getWomanConclusion($this);
    }
}

class ObjectStructure
{
    private $person = [];

    public function acctch(Person $person)
    {
        array_push($this->person, $person);
    }

    public function display(Action $visitor)
    {
        foreach ($this->person as $person) {
            $person->accept($visitor);
        }
    }
}

$objectStructure = new ObjectStructure();
$objectStructure->acctch(new Man());
$objectStructure->acctch(new Woman());

// 成功时的反应
$objectStructure->display(new Success());
// 失败时的反应
$objectStructure->display(new Failing());
// 恋爱时的反应
$objectStructure->display(new Amativeness());
