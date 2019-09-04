<?php

abstract class Phone
{
    /** @var string */
    private $system;
    /** @var Software */
    private $software;

    public abstract function openSoftware();

    public function getSystem(): string
    {
        return $this->system;
    }

    public function setSystem(string $system): void
    {
        $this->system = $system;
    }

    public function getSoftware(): Software
    {
        return $this->software;
    }

    public function setSoftware(Software $software): void
    {
        $this->software = $software;
    }

}

class IOSPhone extends Phone
{
    public function __construct(Software $software)
    {
        $this->setSystem('IOS');
        $this->setSoftware($software);
    }

    public function openSoftware()
    {
        $this->getSoftware()->open($this);
    }
}

class AndroidPhone extends Phone
{
    public function __construct(Software $software)
    {
        $this->setSystem('Android');
        $this->setSoftware($software);
    }

    public function openSoftware()
    {
        $this->getSoftware()->open($this);
    }
}

interface Software
{
    public function open(Phone $phone);
}

class Chrome implements Software
{
    public function open(Phone $phone)
    {
        echo '打开', $phone->getSystem(), '手机的Chrome浏览器', PHP_EOL;
    }
}

class FireFox implements Software
{
    public function open(Phone $phone)
    {
        echo '打开', $phone->getSystem(), '手机的FireFox浏览器', PHP_EOL;
    }
}

$chrome = new Chrome();
$firFox = new FireFox();

$iosPhone = new IOSPhone($chrome);
$iosPhone->openSoftware();
$iosPhone->setSoftware($firFox);
$iosPhone->openSoftware();

$androidPhone = new AndroidPhone($chrome);
$androidPhone->openSoftware();
$androidPhone->setSoftware($firFox);
$androidPhone->openSoftware();
