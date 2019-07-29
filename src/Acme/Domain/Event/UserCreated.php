<?php

namespace Acme\Domain\Event;

use Acme\Domain\User;
use Shared\Event;

class UserCreated implements Event
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }
}