<?php

namespace Shared;

class EventStorage
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Event $event)
    {
        $this->repository->save(serialize($event));
    }
}