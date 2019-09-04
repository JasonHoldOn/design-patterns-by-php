<?php

// 烤串
class Barbecuer
{
    public function bakeMutton()
    {
        echo '烤羊肉串', PHP_EOL;
    }

    public function bakeChickenWing()
    {
        echo '烤鸡翅', PHP_EOL;
    }
}

// 抽象命令
abstract class Command
{
    protected $receiver;

    public function __construct(Barbecuer $receiver)
    {
        $this->receiver = $receiver;
    }

    public abstract function executeCommand();
}

// 烤羊肉串
class BakeMuttonCommand extends Command
{
    public function executeCommand()
    {
        $this->receiver->bakeMutton();
    }
}

// 烤鸡翅
class BakeChickenWingCommand extends Command
{
    public function executeCommand()
    {
        $this->receiver->bakeChickenWing();
    }
}

// 服务员
class Waiter
{
    private $commands = [];

    // 设置订单
    public function setOrder(Command $command)
    {
        if ($command instanceof BakeChickenWingCommand) {
            echo '服务员：鸡翅没有了', PHP_EOL;
        } else {
            echo '增加订单', PHP_EOL;
            array_push($this->commands, $command);
        }
    }

    // 取消订单
    public function cancelOrder(Command $command)
    {
        foreach ($this->commands as $key => $value) {
            if ($command === $value) {
                echo '取消', $command->executeCommand(), PHP_EOL;
                unset($this->commands[$key]);
            }
        }
    }

    // 通知执行
    public function notify()
    {
        /** @var Command $command */
        foreach ($this->commands as $command) {
            $command->executeCommand();
        }
    }
}


// 客户端代码

// 开店前准备
$boy = new Barbecuer();
$bakeMuttonCommand1 = new BakeMuttonCommand($boy);
$bakeMuttonCommand2 = new BakeMuttonCommand($boy);
$bakeMuttonCommand3 = new BakeMuttonCommand($boy);
$bakeChickenWingCommand1 = new BakeChickenWingCommand($boy);
$girl = new Waiter();

// 开门营业
$girl->setOrder($bakeMuttonCommand1);
$girl->setOrder($bakeMuttonCommand2);
$girl->setOrder($bakeMuttonCommand3);
$girl->cancelOrder($bakeMuttonCommand3);
$girl->setOrder($bakeChickenWingCommand1);
$girl->notify();
