<?php

class Car
{
    public function run()
    {
        echo 'go...', PHP_EOL;
    }
}

class Xiaoming
{
    public function goSchool(): Car
    {
        $car = new Car();
        echo '开车去上学,', $car->run();

        return $car;
    }

    public function goParty(): Car
    {
        $car = new Car();
        echo '开车去聚会,', $car->run();

        return $car;
    }

    public function goTravel(): Car
    {
        $car = new Car();
        echo '开车去旅行,', $car->run();

        return $car;
    }
}


$xm = new Xiaoming();
$car1 = $xm->goParty();
$car2 = $xm->goSchool();
$car3 = $xm->goTravel();

var_dump($car1 === $car2);
var_dump($car2 === $car3);
var_dump($car1 === $car3);

class NewCar
{
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new NewCar();
        }

        return self::$instance;
    }

    public function run()
    {
        echo 'go...', PHP_EOL;
    }
}

class Xiaohong
{
    public function goSchool(): NewCar
    {
        $car = NewCar::getInstance();
        echo '开车去上学,', $car->run();

        return $car;
    }

    public function goParty(): NewCar
    {
        $car = NewCar::getInstance();
        echo '开车去聚会,', $car->run();

        return $car;
    }

    public function goTravel(): NewCar
    {
        $car = NewCar::getInstance();
        echo '开车去旅行,', $car->run();

        return $car;
    }
}

$xh = new Xiaohong();
$car1 = $xh->goParty();
$car2 = $xh->goSchool();
$car3 = $xh->goTravel();

var_dump($car1 === $car2);
var_dump($car2 === $car3);
var_dump($car1 === $car3);