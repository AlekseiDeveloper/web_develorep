<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\ArticleRequest;

use App\Services\ArticleService;
use Auth;

class ArticleController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $articles = $this->articleRepository->getAllArticles();

       return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()){
            return redirect('/login');
        }
        $tags =$this->tagRepository->getAllTags();
        return view('admin.articles.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, ArticleService $articleService)
    {
        $articleService->add($request);

        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->getOneArticle($id);
        $tags    = $this->tagRepository->getAllTags();
        return view('web_app.article.show',compact('article','tags'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->getOneArticle($id);
        $tags = $this->tagRepository->getAllTags();

        return view('admin.articles.edit', compact('article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id, ArticleService $articleService)
    {

        $articleService->update($request,$id);

        return redirect()->route('admin.articles.show',['article' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->getOneArticle($id);

        $article->tags()->detach();
        if($article->delete()){
            return redirect()->route('admin.articles.index');
        }
    }
}
