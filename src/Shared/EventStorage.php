<?php

namespace Shared;

class EventStorage
{
    private $repository;

    private $nextEventNumber = 1;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Event $event)
    {
        $this->repository->save(serialize($event));
    }

    public function getNextEvent(): Event
    {
        if (!$event = $this->repository->get($this->nextEventNumber)) {
            return null;
        }
        $this->nextEventNumber++;

        return unserialize($event);
    }

    public function getCurrentEventNumber()
    {
        return $this->nextEventNumber - 1;
    }
}