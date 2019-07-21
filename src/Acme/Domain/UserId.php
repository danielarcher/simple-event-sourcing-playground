<?php

namespace Acme\Domain;

use Ramsey\Uuid\Uuid;

class UserId
{
    /**
     * @var string
     */
    private $value;

    /**
     * UserName constructor.
     * @param string $value
     */
    public function __construct(Uuid $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->value->toString();
    }
}