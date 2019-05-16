<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use Auth;

class MainController extends BaseController
{
    public function index() {

        $userAuth = Auth::user();
        $articles = $this->articles->getAllArticles();
        $tags = $this->tags->getAllTags();

        return $this->siteRender('web_app.index',compact('articles','tags','userAuth'));

    }
}
