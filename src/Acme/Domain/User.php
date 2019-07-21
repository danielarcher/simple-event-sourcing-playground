<?php

namespace Acme\Domain;

/**
 * Class User
 * @package Acme\Domain
 */
class User
{
    /**
     * @var UserName
     */
    private $name;

    /**
     * User constructor.
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