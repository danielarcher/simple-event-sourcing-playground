<?php

namespace Acme\Infrastructure;

use Shared\Repository;

class InMemoryRepository implements Repository
{
    private $data = array();

    public function save(string $value): void
    {
        $this->data[] = $value;
    }

    public function update($index, string $value): void
    {
        $this->data[$index] = $value;
    }

    public function get($index): string
    {
        return $this->data[$index];
    }
}