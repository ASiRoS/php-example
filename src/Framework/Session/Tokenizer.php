<?php

final class Tokenizer
{
    /**
     * @var SessionInterface
     */
    private $session;
    
    /**
     * @var BaseUser
     */
    private $user;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function setUser(?BaseUser $user): void 
    {
        $this->user = $user;
    }

    public function isAuthorized(): bool
    {
        return is_null($this->user);
    }
}