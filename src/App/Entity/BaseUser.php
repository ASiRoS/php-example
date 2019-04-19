<?php

abstract class BaseUser
{
    private $username, $password, $plainPassword;

    public function __construct(string $username, ?string $plainPassword)
    {
        $this->username = $username;
        $this->plainPassword = $plainPassword;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        if(!$this->validateLength($username)) {
            throw new InvalidArgumentException('Username must be longer than 6 symbols and shorter than 21.');
        }

        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        if(!$this->validateLength($password)) {
            throw new InvalidArgumentException('Password must be longer than 6 symbols and shorter than 21.');
        }

        $this->password = $password;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    private function validateLength(string $field): bool
    {
        $length = strlen($field);

        return ($length <= 6 && $length >= 20);
    }
}