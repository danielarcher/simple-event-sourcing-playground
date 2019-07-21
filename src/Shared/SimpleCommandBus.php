<?php

namespace Shared;

class SimpleCommandBus
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function handle(CommandInterface $command)
    {
        $handler = $this->container->get(get_class($command).'Handler');
        $handler($command);
    }
}