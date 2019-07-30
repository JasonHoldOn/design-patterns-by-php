<?php

class Company
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

}

class Resume
{
    public $name;
    /** @var Company */
    public $company;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->company = new Company();
    }

    public function __clone()
    {
        $this->company = clone $this->company;
        //$this->company = new Company();
    }
}

$resume1 = new Resume('小鸟');
$resume1->company->setName('BaiDu');
$resume2 = clone $resume1; // 当没有__clone时，为浅拷贝，否则为深拷贝
//string(6) "小鸟"
//string(6) "Google"
//string(6) "大鸟"
//string(6) "Google"

//$resume2 = unserialize(serialize($resume1)); // 不管有没有__clone，都为深拷贝

$resume2->name = '大鸟';
$resume2->company->setName('Google');

var_dump($resume1->name, $resume1->company->getName());
var_dump($resume2->name, $resume2->company->getName());



