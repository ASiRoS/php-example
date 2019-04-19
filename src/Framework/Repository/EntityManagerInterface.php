<?php

interface EntityManagerInterface
{
    public function persist($entity): void;

    public function remove($entity): void;

    public function flush(): void;
}