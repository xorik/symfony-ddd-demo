<?php

namespace App\Domain\Entity;

class User
{
    private $id;
    private $name;
    private $email;
    private $loginCount;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->loginCount = 0;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLoginCount(): int
    {
        return $this->loginCount;
    }

    public function incrementLoginCount(): void
    {
        $this->loginCount++;
    }
}
