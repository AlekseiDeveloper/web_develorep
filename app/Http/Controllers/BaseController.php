<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;

class BaseController extends Controller
{
    protected $articles;
    protected $tags;

    public function __construct(ArticleRepository $articleRepository, TagRepository $tagRepository)
    {
        $this->articles = $articleRepository;
        $this->tags = $tagRepository;
    }

    /**
     * @param  string  $view
     * @param  array   $data
     * @return View|Factory
     */
    public function siteRender(string $view, array $data = [])
    {
        return view($view, $data);
    }
}
