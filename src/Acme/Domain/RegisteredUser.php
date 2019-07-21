<?php

namespace Acme\Domain;

/**
 * Class RegisteredUser
 * @package Acme\Domain
 */
class RegisteredUser
{
    /**
     * @var UserName
     */
    private $name;

    /**
     * RegisteredUser constructor.
     * @param UserName $name
     */
    public function __construct(UserName $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name->toString();
    }
}