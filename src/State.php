<?php


interface State
{
    public function register();

    public function apply();

    public function draw(int $money);
}

class RegisterState implements State
{
    public function register()
    {
        echo '游客，注册中...', PHP_EOL;
    }

    public function apply()
    {
        echo '游客，不能申请授信', PHP_EOL;
    }

    public function draw(int $money)
    {
        echo '游客，不能申请借款', $money, '元', PHP_EOL;
    }
}

class ApplyState implements State
{
    public function register()
    {
        echo '授信用户，不需要再注册', PHP_EOL;
    }

    public function apply()
    {
        echo '授信用户，不需要再授信', PHP_EOL;
    }

    public function draw(int $money)
    {
        echo '授信用户，申请借款', $money, '元，借款中...', PHP_EOL;
    }
}

class DrawState implements State
{
    public function register()
    {
        echo '借款用户，不需要再注册', PHP_EOL;
    }

    public function apply()
    {
        echo '借款用户，不需要再授信', PHP_EOL;
    }

    public function draw(int $money)
    {
        echo '借款用户，已申请借款', $money, '元，待还款...', PHP_EOL;
    }
}

class User
{
    /** @var State */
    protected $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function register()
    {
        $this->state->register();
    }

    public function apply()
    {
        $this->state->apply();
    }

    public function draw(int $money)
    {
        $this->state->draw($money);
    }
}

$user = new User();
$user->setState(new RegisterState());
$user->register();
$user->apply();
$user->draw(100);

$user->setState(new ApplyState());
$user->register();
$user->apply();
$user->draw(200);

$user->setState(new DrawState());
$user->register();
$user->apply();
$user->draw(300);