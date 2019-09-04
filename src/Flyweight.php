<?php

namespace Flyweight;

class User
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

abstract class WebSite
{
    abstract function use(User $user);
}

class ConcreteWebSite extends WebSite
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    function use(User $user)
    {
        echo '网站分类：', $this->name, ',用户：', $user->getName(), PHP_EOL;
    }
}

class WebSiteFactory
{
    private $flyweights = [];

    public function getWebSite($key)
    {
        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new ConcreteWebSite($key);
        }

        return $this->flyweights[$key];
    }

    public function getWebSiteCount(): int
    {
        return count($this->flyweights);
    }
}

$f = new WebSiteFactory();
$fx = $f->getWebSite('产品展示');
$fx->use(new User('张伟'));

$fy = $f->getWebSite('产品展示');
$fy->use(new User('王伟'));

$fz = $f->getWebSite('产品展示');
$fz->use(new User('王芳'));

$fl = $f->getWebSite('博客');
$fl->use(new User('李伟'));

$fm = $f->getWebSite('博客');
$fm->use(new User('王秀英'));

$fn = $f->getWebSite('博客');
$fn->use(new User('李秀英'));

echo '网站分类总数:', $f->getWebSiteCount(), PHP_EOL;