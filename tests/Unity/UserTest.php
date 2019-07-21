<?php

namespace Acme\Tests\Unity;

use Acme\Domain\User;
use Acme\Domain\UserName;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function new_user()
    {
        $user = new User(new UserName('Foo'));
        $this->assertEquals('Foo', $user->name());
    }
}