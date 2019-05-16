<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;

class MainController extends Controller
{
    protected $articleRepository;
    protected $tagRepository;
    protected $userRepository;

    public function __construct(ArticleRepository $articleRepository, TagRepository $tagRepository, UserRepository $userRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
        $this->userRepository = $userRepository;
    }
}
