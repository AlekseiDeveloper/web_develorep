<?php

namespace App\Http\Controllers\Site\Article;

use App\Http\Controllers\BaseController;

class ArticleController extends BaseController
{

    public function show($id)
    {
        $article = $this->articles->getOneArticle($id);
        $tags = $this->tags->getAllTags();

        return $this->siteRender("web_app.article.show", compact('article','tags'));
    }
}
