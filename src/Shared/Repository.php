<?php

namespace Shared;

interface Repository
{
    public function save(string $value): void;
}