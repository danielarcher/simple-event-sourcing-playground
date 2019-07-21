<?php

namespace Acme\Domain;

/**
 * Class UserName
 * @package Acme\Domain
 */
class UserName
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