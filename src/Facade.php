<?php

class SubSystem1
{
    public function handle()
    {
        echo __METHOD__, PHP_EOL;
    }
}

class SubSystem2
{
    public function handle()
    {
        echo __METHOD__, PHP_EOL;
    }
}

class SubSystem3
{
    public function handle()
    {
        echo __METHOD__, PHP_EOL;
    }
}

class Facade
{
    protected $subSystem1;
    protected $subSystem2;
    protected $subSystem3;

    public function __construct()
    {
        $this->subSystem1 = new SubSystem1();
        $this->subSystem2 = new SubSystem2();
        $this->subSystem3 = new SubSystem3();
    }

    public function handle1()
    {
        $this->subSystem1->handle();
        $this->subSystem3->handle();
    }

    public function handle2()
    {
        $this->subSystem2->handle();
        $this->subSystem1->handle();
    }
}

$facade = new Facade();
$facade->handle1();
$facade->handle2();