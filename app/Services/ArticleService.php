<?php

namespace App\Services;

use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use Auth;
use Carbon\Carbon;
use App\Repositories\UserRepository;


class ArticleService extends MainService
{
    protected $articleRepository;
    protected $tagRepository;
    protected $userRepository;

    public function __construct(ArticleRepository $articleRepository, TagRepository $tagRepository,UserRepository $userRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
        $this->userRepository = $userRepository;
    }

    public function add(ArticleRequest $request){

        $input = $request->all();

        $tag = $this->tagRepository->getOneTag($input['tag']);
        $input['tag'] =  $tag;

        $article = new Article();
        $add = $article->create($input);
        $newArticle = $add->created_at = new Carbon($input['date']);

        if(Auth::user()){
           /* $user = $this->userRepository->getOneUser(Auth::user()->id);
            $user->article_id = $add->id;
            $user->save();*/

            $add->user_id = Auth::user()->id;
        }

        if($add->save()){
            $request->session()->flash('status', 'Статья успешно создана');
        }

        $add->tags()->attach($input['tag']);
    }

    public function update(ArticleRequest $request,$id){

        $input = $request->all();

        $article = $this->articleRepository->getOneArticle($id);
        $tag = $this->tagRepository->getOneTag($input['tag']);

        $input['tag'] =  $tag;
        $article->created_at = new Carbon($input['date']);

        if($article->update($input)){
            $request->session()->flash('status', 'Статья успешно обновлена');
        }
        $article->tags()->attach($input['tag']);
    }
}
