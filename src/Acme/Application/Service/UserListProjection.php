<?php

namespace Acme\Application\Service;

use Acme\Domain\Event\UserCreated;
use Doctrine\DBAL\Connection;
use Shared\Event;
use Shared\EventStorage;

class UserListProjection
{
    private $eventStorage;
    private $conn;
    private $listenedEvents;

    public function __construct(EventStorage $eventStorage, Connection $conn, array $listenedEvents)
    {
        $this->eventStorage = $eventStorage;
        $this->conn = $conn;
        $this->listenedEvents = $listenedEvents;
    }

    public function project()
    {
        while (true) {
            $event = $this->eventStorage->getNextEvent();
            if (!$event) {
                continue;
            }
            if (!$this->isEventListened($event)) {
                continue;
            }
            $this->replayEvent($event);
        }
    }

    private function isEventListened(Event $event): bool
    {
        return in_array(get_class($event), $this->listenedEvents);
    }

    public function replayEvent(Event $event)
    {
        switch (get_class($event)) {
            case 'Acme\Domain\Event\UserCreated':
                /**
                 * @var UserCreated $event;
                 */
                $user = $event->user();
                $this->conn->insert('users', [
                    'id' => $user->id(),
                    'name' => $user->name(),
                ]);
        }
    }
}