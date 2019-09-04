<?php

abstract class Handler
{
    /** @var Handler */
    protected $successor;

    // 设置后继者
    public function setSuccessor(Handler $successor): void
    {
        $this->successor = $successor;
    }

    // 处理请求的抽象方法
    public abstract function handleRequest(int $request);
}

// 如果可以处理请求，就处理之，否则转发给它的后继者
class ConcreteHandler1 extends Handler
{
    public function handleRequest(int $request)
    {
        if ($request >= 0 && $request < 10) {
            echo __METHOD__, ' Handle it', PHP_EOL;
        } elseif ($this->successor instanceof Handler) {
            // 转移给后继者
            $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler2 extends Handler
{
    public function handleRequest(int $request)
    {
        if ($request >= 10 && $request < 20) {
            echo __METHOD__, ' Handle it', PHP_EOL;
        } elseif ($this->successor instanceof Handler) {
            // 转义给后继者
            $this->successor->handleRequest($request);
        }
    }
}

// 客户端代码
$h1 = new ConcreteHandler1();
$h2 = new ConcreteHandler2();
$h1->setSuccessor($h2);
foreach ([1, 5, 7, 16, 25] as $request) {
    $h1->handleRequest($request);
}