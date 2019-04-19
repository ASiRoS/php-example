<?php

final class UserController extends BaseController
{
    public function register(RequestInterface $request, UserManager $userManager, Tokenizer $tokenizer): RedirectResponse
    {
        $data = $request->all();

        $user = $userManager->create($request);

        $tokenizer->setUser($user);
    }

    public function login(RequestInterface $request, Tokenizer $tokenizer): RedirectResponse
    {
        $errors = $request->validate();

        $userRepository = $this->getRepository(User::class);

        $user = $userRepository->findBy($request->all());

        if(is_null($user)) {
            return RedirectResponse()->withErrors($errors);
        }

        $tokenizer->setUser($user);

        return RedirectResponse()->withSuccess('You\'ve been authorized.');
    }
}