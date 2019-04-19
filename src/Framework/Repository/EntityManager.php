<?php

class EntityManager implements EntityManagerInterface
{
    /**
     * @var ObjectInterface
     */
    private $repository;

    public function __construct(ObjectInterface $repository)
    {
        $this->repository = $repository;
    }

    public function persist($entity): void
    {

    }

    public function remove($entity): void
    {

    }

    public function flush(): void
    {
        // some actions
        $repository = $this->repository;

        $repository->insert();
        $repository->update();
        $repository->delete();
    }

}