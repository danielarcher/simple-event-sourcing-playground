<?php

namespace Shared;

abstract class StringValueObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * UserName constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->value;
    }
}