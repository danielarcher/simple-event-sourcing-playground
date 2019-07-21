<?php

namespace Acme\Application;

use Acme\Domain\Event\UserCreated;
use Acme\Domain\User;
use Acme\Domain\UserId;
use Acme\Domain\UserName;
use Ramsey\Uuid\Uuid;
use Shared\EventStorage;

/**
 * Class CreateUserCommandHandler
 * @package Acme\Application
 */
class CreateUserCommandHandler
{
    /**
     * @var EventStorage
     */
    private $eventStorage;

    /**
     * CreateUserCommandHandler constructor.
     * @param EventStorage $eventStorage
     */
    public function __construct(EventStorage $eventStorage)
    {
        $this->eventStorage = $eventStorage;
    }

    /**
     * @param CreateUserCommand $command
     * @throws \Exception
     */
    public function __invoke(CreateUserCommand $command)
    {
        $user = new User(
            new UserId(Uuid::uuid4()),
            new UserName($command->name)
        );
        $this->eventStorage->store(new UserCreated($user));
    }
}