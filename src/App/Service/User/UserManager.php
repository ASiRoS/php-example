<?php

final class UserManager
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var EntityManager
     */
    private $entityManager;

    private $createRules = [], $updateRules = [];

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    public function create(RequestInterface $request): User
    {
        $this->validator->validate($request, $this->createRules);

        $data = $request->all();

        $user = new User($data['username'], $data['email'], $data['password']);

        $entityManager = $this->entityManager;
        $entityManager->persist($user);
        $entityManager->flush();
    }

    public function update(RequestInterface $request, User $user): bool
    {
        $this->validator->validate($request, $this->updateRules);
        
        // ...
    }
}