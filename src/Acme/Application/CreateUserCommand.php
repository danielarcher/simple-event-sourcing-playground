<?php

namespace Acme\Application;

use Shared\CommandInterface;

class CreateUserCommand implements CommandInterface
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}