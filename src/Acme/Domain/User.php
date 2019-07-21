<?php

namespace Acme\Domain;

/**
 * Class User
 * @package Acme\Domain
 */
class User
{
    private $id;

    /**
     * @var UserName
     */
    private $name;

    /**
     * User constructor.
     * @param UserName $name
     */
    public function __construct(UserId $id, UserName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name->toString();
    }
}