<?php

class PostController extends BaseController
{
    public function index(): View
    {
        $posts = $this->getRepository(Post::class)->findAll();

        return View::make('template', compact('posts'));
    }
}