<?php

class User extends BaseUser
{
    private $email;

    public function __construct(string $username, string $email, ?string $plainPassword)
    {
        parent::__construct($username, $plainPassword);
        $this->setEmail($email);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
            throw new InvalidArgumentException('Invalid email!');
        }

        $this->email = $email;
    }
}