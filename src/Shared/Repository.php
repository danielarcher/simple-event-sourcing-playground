<?php

namespace Shared;

interface Repository
{
    public function save(string $value): void;
    public function update($index, string $value): void;
    public function get($index): string;
}